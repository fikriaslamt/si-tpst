<?php

namespace App\Controllers;
use App\Models\M_setoran;
use App\Models\M_penarikan;
use App\Models\M_limbah;
use App\Models\M_tabungan;
use App\Models\M_nasabah;
use App\Models\M_sampah_masuk;
use App\Models\M_daftar_limbah;
use App\Models\M_daftar_produk;
use App\Models\M_sampah;
use App\Models\M_produk;
use App\Models\M_kelola_sampah;
use App\Models\M_pengangkutan_sampah;
use App\Models\M_penjualan_produk;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends BaseController {

    public function exportRiwayatSetoran(){


        $file_name = 'Riwayat Setoran.xlsx';

		$spreadsheet = new Spreadsheet();

        $setoran= new M_setoran();
        
        $data = $setoran->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal');
		$sheet->setCellValue('C1', 'No Tabungan');
		$sheet->setCellValue('D1', 'Jenis Sampah');
		$sheet->setCellValue('E1', 'Berat Total (kg)');
		$sheet->setCellValue('F1', 'Total Harga');
		$sheet->setCellValue('G1', 'Admin');

        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal']);
			$sheet->setCellValue('C' . $count, $row['no_tabungan']);
			$sheet->setCellValue('D' . $count, $row['jenis']);
			$sheet->setCellValue('E' . $count, $row['total_berat'].' '.$row['satuan']);
			$sheet->setCellValue('F' . $count, $row['total_harga']);
			$sheet->setCellValue('G' . $count, $row['nama']);

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();

		readfile($file_name);

		exit;


       
      
 
    }
    public function exportRiwayatPenarikan(){


        $file_name = 'Riwayat Penarikan.xlsx';

		$spreadsheet = new Spreadsheet();

        $penarikan= new M_penarikan();
        $data = $penarikan->getDataByNomor(123123);
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal');
		$sheet->setCellValue('C1', 'No Tabungan');
		$sheet->setCellValue('D1', 'Total Penarikan');
		$sheet->setCellValue('E1', 'Admin');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal']);
			$sheet->setCellValue('C' . $count, $row['no_tabungan']);
			$sheet->setCellValue('D' . $count, $row['total_penarikan']);
			$sheet->setCellValue('E' . $count, $row['nama']);

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));

		flush();

		readfile($file_name);

		exit;

    }
    public function exportDataLimbah(){


        $file_name = 'Data Limbah.xlsx';

		$spreadsheet = new Spreadsheet();

        $limbah= new M_limbah();
        $data = $limbah->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal Masuk');
		$sheet->setCellValue('C1', 'Jenis Limbah');
		$sheet->setCellValue('D1', 'Instansi');
		$sheet->setCellValue('E1', 'Berat');
		$sheet->setCellValue('F1', 'Harga');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal_masuk']);
			$sheet->setCellValue('C' . $count, $row['jenis_limbah']);
			$sheet->setCellValue('D' . $count, $row['instansi']);
			$sheet->setCellValue('E' . $count, $row['total_berat'].' '.$row['satuan']);
			$sheet->setCellValue('F' . $count, $row['total_harga']);

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

    public function exportDaftarLimbah(){


        $file_name = 'Daftar Limbah.xlsx';

		$spreadsheet = new Spreadsheet();

        $limbah= new M_daftar_limbah();
        $data = $limbah->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal Update');
		$sheet->setCellValue('C1', 'Jenis Limbah');
		$sheet->setCellValue('D1', 'Harga');



        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal_update']);
			$sheet->setCellValue('C' . $count, $row['jenis_limbah']);
			$sheet->setCellValue('D' . $count, $row['harga']);


			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }
    public function exportDataNasabah(){


        $file_name = 'Data Nasabah.xlsx';

		$spreadsheet = new Spreadsheet();

        $nasabah= new M_nasabah();
        $data = $nasabah->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'No Tabungan');
		$sheet->setCellValue('C1', 'Nama');
		$sheet->setCellValue('D1', 'Alamat');
		$sheet->setCellValue('E1', 'Kode Akses');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['no_tabungan']);
			$sheet->setCellValue('C' . $count, $row['nama']);
			$sheet->setCellValue('D' . $count, $row['alamat']);
			$sheet->setCellValue('E' . $count, $row['kode']);

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

    public function exportDataTabungan(){


        $file_name = 'Data Tabungan.xlsx';

		$spreadsheet = new Spreadsheet();

        $tabungan= new M_tabungan();
        $data = $tabungan->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No Tabungan');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Saldo');
		$sheet->setCellValue('D1', 'Kredit');


        $count = 2;

        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $row['no_tabungan']);
			$sheet->setCellValue('B' . $count, $row['nama']);
			$sheet->setCellValue('C' . $count, $row['saldo']);
			$sheet->setCellValue('D' . $count, $row['kredit']);


			$count++;
	
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }



	public function exportDataSampah(){


        $file_name = 'Data Sampah.xlsx';

		$spreadsheet = new Spreadsheet();

        $sampah = new M_kelola_sampah();
        $data = $sampah->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal Masuk');
		$sheet->setCellValue('C1', 'Instansi');
		$sheet->setCellValue('D1', 'Status');
		$sheet->setCellValue('E1', 'Total Berat (ton)');
		$sheet->setCellValue('F1', 'Berat Kompos');
		$sheet->setCellValue('G1', 'Berat Maggot');
		$sheet->setCellValue('H1', 'Sisa Tidak Terkelola');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal_masuk']);
			$sheet->setCellValue('C' . $count, $row['instansi']);
			$sheet->setCellValue('D' . $count, $row['status']);
			$sheet->setCellValue('E' . $count, $row['total_berat']);
			$sheet->setCellValue('F' . $count, $row['berat_kompos']);
			$sheet->setCellValue('G' . $count, $row['berat_maggot']);
			$sheet->setCellValue('H' . $count, $row['tidak_terkelola']);

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

	public function exportDaftarSampah(){


        $file_name = 'Daftar Sampah.xlsx';

		$spreadsheet = new Spreadsheet();

        $sampah = new M_sampah();
        $data = $sampah->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Jenis Sampah');
		$sheet->setCellValue('C1', 'Tanggal Update');
		$sheet->setCellValue('D1', 'Harga TPST');
		$sheet->setCellValue('E1', 'Harga Nasabah');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['jenis']);
			$sheet->setCellValue('C' . $count, $row['tanggal_update']);
			$sheet->setCellValue('D' . $count, $row['harga_tpst']);
			$sheet->setCellValue('E' . $count, $row['harga_nasabah']);
	

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

	public function exportPengangkutanSampah(){


        $file_name = 'Data Pengangkutan Sampah.xlsx';

		$spreadsheet = new Spreadsheet();

        $sampah = new M_pengangkutan_sampah();
        $data = $sampah->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal');
		$sheet->setCellValue('C1', 'Sopir Pengangkut');



        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal']);
			$sheet->setCellValue('C' . $count, $row['pengangkut']);

	

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }


	public function exportDaftarProduk(){


        $file_name = 'Daftar Produk.xlsx';

		$spreadsheet = new Spreadsheet();

        $produk= new M_daftar_produk();
        $data = $produk->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal Update');
		$sheet->setCellValue('C1', 'Jenis Produk');
		$sheet->setCellValue('D1', 'Harga');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal_update']);
			$sheet->setCellValue('C' . $count, $row['jenis_produk']);
			$sheet->setCellValue('D' . $count, $row['harga']);

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

	public function exportDataProduk(){


        $file_name = 'Data Produk.xlsx';

		$spreadsheet = new Spreadsheet();

        $produk= new M_produk();
        $data = $produk->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal Update');
		$sheet->setCellValue('C1', 'Jenis Produk');
		$sheet->setCellValue('D1', 'Sisa Stok');
		$sheet->setCellValue('E1', 'Total Terjual');
		$sheet->setCellValue('F1', 'Total Nominal');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal_update']);
			$sheet->setCellValue('C' . $count, $row['jenis_produk']);
			$sheet->setCellValue('D' . $count, $row['stok']);
			$sheet->setCellValue('E' . $count, $row['total_penjualan']);
			$sheet->setCellValue('F' . $count, number_format($row['nominal_penjualan'],2,',','.'));

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

	public function exportRiwayatPenjualan(){


        $file_name = 'Data Riwayat Penjualan Produk.xlsx';

		$spreadsheet = new Spreadsheet();

        $produk= new M_penjualan_produk();
        $data = $produk->getAllData();
     
     
        $sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Tanggal');
		$sheet->setCellValue('C1', 'Admin');
		$sheet->setCellValue('D1', 'Total');
		$sheet->setCellValue('E1', 'Nominal');


        $count = 2;
        $number = 1;
        foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $number);
			$sheet->setCellValue('B' . $count, $row['tanggal']);
			$sheet->setCellValue('C' . $count, $row['nama']);
			$sheet->setCellValue('D' . $count, $row['total_terjual']);
			$sheet->setCellValue('E' . $count, number_format($row['nominal_penjualan'],2,',','.'));

			$count++;
			$number++;
		}

        $writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");
		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length:' . filesize($file_name));
		flush();
		readfile($file_name);

		exit;

    }

    
}
