<?php

include '../upload-php/api-google/vendor/autoload.php';

function uploadFileToDrive($parentFolderId, $folderName, $fileName, $fileTempPath)
{
    try {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=../upload-php/upload-pdf-405104-69c69d6b9a4a.json');
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/drive.file']);
        $service = new Google_Service_Drive($client);

        // Obtener el año y mes actual en español
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
            // La carpeta del año actual no existe, crear una nueva
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $currentYear,
                'mimeType' => 'application/vnd.google-apps.folder',
                'parents' => [$parentFolderId],
            ]);
            $yearFolder = $service->files->create($fileMetadata, ['fields' => 'id']);
            $yearFolderId = $yearFolder->id;
        } else {
            // La carpeta del año actual ya existe, usar su ID
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
            // La subcarpeta del mes actual no existe, crear una nueva
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $currentMonth,
                'mimeType' => 'application/vnd.google-apps.folder',
                'parents' => [$yearFolderId],
            ]);
            $monthFolder = $service->files->create($fileMetadata, ['fields' => 'id']);
            $monthFolderId = $monthFolder->id;
        } else {
            // La subcarpeta del mes actual ya existe, usar su ID
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
            // La última subcarpeta no existe, crear una nueva
            $fileMetadata = new Google_Service_Drive_DriveFile([
                'name' => $folderName,
                'mimeType' => 'application/vnd.google-apps.folder',
                'parents' => [$monthFolderId],
            ]);
            $lastFolder = $service->files->create($fileMetadata, ['fields' => 'id']);
            $lastFolderId = $lastFolder->id;
        } else {
            // La última subcarpeta existe, usar su ID
            $lastFolderId = $results->getFiles()[0]->getId();
        }

        // Subir archivo a la última subcarpeta
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $fileName,
            'parents' => [$lastFolderId],
        ]);

        // Subir archivo a la carpeta
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $fileName,
            'parents' => [$lastFolderId], // Establecer la carpeta como padre
        ]);

        // Subir archivo a la carpeta
        $file = $service->files->create(
            $fileMetadata,
            array(
                'data' =>  file_get_contents($fileTempPath, FILE_BINARY),
                'mimeType' => 'application/pdf',
                'uploadType' => 'media'
            )
        );

        return 'https://drive.google.com/file/d/' . $file->id . '/preview';
    } catch (Exception $e) {
        return $e->getMessage();
    }
}






