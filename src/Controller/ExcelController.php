<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ExcelController extends AbstractController
{
    /**
     * @Route("/api/upload-excel", name="api_excel_upload", methods={"POST"})
     */
    public function UploadExcel(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        try {
            // 1. Get the uploaded file
            $file = $request->files->get('file');

            // 2. Check if a file was uploaded
            if ($file === null) {
                throw new \Exception('No file uploaded');
            }

            // 3. Define the folder to store the uploaded files
            $fileFolder = $this->getParameter('kernel.project_dir') . '/public/uploads/';

            // 4. Generate a unique filename
            $filePathName = md5(uniqid()) . '.' . $file->getClientOriginalExtension();

            // 5. Move the file to the specified folder
            $file->move($fileFolder, $filePathName);

            // 6. Load the Excel file
            $spreadsheet = IOFactory::load($fileFolder . $filePathName);

            // 7. Remove the first row (if needed)
            $spreadsheet->getActiveSheet()->removeRow(1);

            // 8. Read the data into an array
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // 9. Do something with $sheetData (e.g., process the Excel data)
            $entityManager = $doctrine->getManager(); 
            foreach ($sheetData as $Row) { 
                // ... your processing code here ...
            } 
            
            return $this->render('excel-importer/dist/excel-importer/index.html');

        } catch (FileException $e) {
            return $this->json(['error' => 'Error uploading file']);
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()]);
        }
    }

    /**
 * @Route("/api/upload-excel", name="excel_import", methods={"GET"})
 */
    public function excelImport(): Response
{
    return $this->render('excel-importer/dist/excel-importer/index.html');
}

}
