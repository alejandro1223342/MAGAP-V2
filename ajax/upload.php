<?php

require_once '../upload-php/api-google/vendor/autoload.php';

function uploadFileToDrive($parentFolderId, $folderName, $fileName, $fileTempPath)
{
    try {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=../upload-php/upload-pdf-405104-69c69d6b9a4a.json');
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);
        $service = new Google_Service_Drive($client);

        $currentYear = date('Y');
        setlocale(LC_TIME, 'es_ES');
        $currentMonth = strftime('%B');

        // Verificar si la carpeta del año actual existe en la carpeta padre
        $yearFolderId = null;
        $optParams = [
            'q' => "mimeType='application/vnd.google-apps.folder' and name='$currentYear' and '$parentFolderId' in parents",
            'spaces' => 'drive',
        ];
        $results = $service->files->listFiles($optParams);

        if (count($results->getFiles()) == 0) {
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $currentYear,
                'mimeType' => 'application/vnd.google-apps.folder',
                'parents' => [$parentFolderId],
            ]);
            $yearFolder = $service->files->create($fileMetadata, ['fields' => 'id']);
            $yearFolderId = $yearFolder->id;
        } else {
            $yearFolderId = $results->getFiles()[0]->getId();
        }

        // Verificar si la subcarpeta del mes actual existe en la carpeta del año actual
        $monthFolderId = null;
        $optParams = [
            'q' => "mimeType='application/vnd.google-apps.folder' and name='$currentMonth' and '$yearFolderId' in parents",
            'spaces' => 'drive',
        ];
        $results = $service->files->listFiles($optParams);

        if (count($results->getFiles()) == 0) {
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $currentMonth,
                'mimeType' => 'application/vnd.google-apps.folder',
                'parents' => [$yearFolderId],
            ]);
            $monthFolder = $service->files->create($fileMetadata, ['fields' => 'id']);
            $monthFolderId = $monthFolder->id;
        } else {
            $monthFolderId = $results->getFiles()[0]->getId();
        }

        // Verificar si la última subcarpeta existe en la carpeta del mes actual
        $lastFolderId = null;
        $optParams = [
            'q' => "mimeType='application/vnd.google-apps.folder' and name='$folderName' and '$monthFolderId' in parents",
            'spaces' => 'drive',
        ];
        $results = $service->files->listFiles($optParams);

        if (count($results->getFiles()) == 0) {
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $folderName,
                'mimeType' => 'application/vnd.google-apps.folder',
                'parents' => [$monthFolderId],
            ]);
            $lastFolder = $service->files->create($fileMetadata, ['fields' => 'id']);
            $lastFolderId = $lastFolder->id;
        } else {
            $lastFolderId = $results->getFiles()[0]->getId();
        }

        // Verificar si el archivo ya existe en la última carpeta
        $fileId = null;
        $optParams = [
            'q' => "mimeType='application/pdf' and name='$fileName' and '$lastFolderId' in parents",
            'spaces' => 'drive',
        ];
        $results = $service->files->listFiles($optParams);

        if (count($results->getFiles()) == 0) {
            // El archivo no existe, crear uno nuevo en la última carpeta
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $fileName,
                'parents' => [$lastFolderId],
            ]);

            $file = $service->files->create(
                $fileMetadata,
                array(
                    'data' => file_get_contents($fileTempPath, FILE_BINARY),
                    'mimeType' => 'application/pdf',
                    'uploadType' => 'media'
                )
            );

            return 'https://drive.google.com/file/d/' . $file->id . '/preview';
        } else {
            // El archivo ya existe, obtener su ID
            // El archivo ya existe, obtener su ID
            $fileId = $results->getFiles()[0]->getId();

            // Actualizar el contenido del archivo existente en la última carpeta
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $fileName,
            ]);

            $updatedFile = $service->files->update(
                $fileId,
                $fileMetadata,
                array(
                    'data' => file_get_contents($fileTempPath, FILE_BINARY),
                    'mimeType' => 'application/pdf',
                    'uploadType' => 'media'
                )
            );

            return 'https://drive.google.com/file/d/' . $updatedFile->id . '/preview';
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
