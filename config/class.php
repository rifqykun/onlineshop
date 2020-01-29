<?php 
session_start();
$db = new mysqli("localhost","root","","tranit");
date_default_timezone_set("Asia/Jakarta");
class pelanggan
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi = $db;
	}
	function login_pelanggan($em,$pass)
	{
		$ps=sha1($pass);
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$em' AND password_pelanggan='$ps'");
		$hitung = $ambil->num_rows;
		if ($hitung==1) 
		{
			$akun = $ambil->fetch_assoc();
			$_SESSION['pelanggan'] = $akun;
			return "sukses-member";
		}
		else
		{
			$ambil = $this->koneksi->query("SELECT * FROM admin WHERE email_admin='$em' AND password_admin='$ps'");
			$hitung = $ambil->num_rows;
			if ($hitung==1) 
			{
				$akun = $ambil->fetch_assoc();
				$_SESSION['admin'] = $akun;
				return "sukses-admin";
			}
			else
			{
				return "gagal";
			}
		}
		
	}
	function tampil_pelanggan()
	{
		$ambil_pelanggan = $this->koneksi->query("SELECT * FROM pelanggan");
		while($pecah_pelanggan = $ambil_pelanggan->fetch_assoc())
		{
			$semua_pelanggan[] = $pecah_pelanggan;
		}
		return $semua_pelanggan;
	}
	function tambah_pelanggan($email,$pass,$nama,$tlp,$alamat,$foto)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
		$hitung = $ambil->num_rows;
		if ($hitung==0) 
		{
			$password = sha1($pass);
			$nama_foto = $foto['name'];
			$lokasi_foto = $foto['tmp_name'];
			$foto_fiks = date("Y-m-d-H-i-s")."-".$nama_foto;
			move_uploaded_file($lokasi_foto, "foto_pelanggan/$foto_fiks");
			$this->koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan,foto_pelanggan)VALUES('$email','$password','$nama','$tlp','$alamat','$foto_fiks')");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
		
	}
	function ambil_pelanggan_email($email)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
		$pecah = $ambil->num_rows;
		return $pecah;
	}
	function ambil_pelanggan($id)
	{
		$ambil_pelanggan = $this->koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
		$pecah = $ambil_pelanggan->fetch_assoc();
		return $pecah;
	}
	function hapus_pelanggan($id)
	{
		$detail = $this->ambil_pelanggan($id);
		$hapus_pelanggan = $detail['foto_pelanggan'];
		if (file_exists("foto_pelanggan/$hapus_pelanggan")) 
		{
			unlink("foto_pelanggan/$hapus_pelanggan");
		}
		$this->koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id'");
	}
	function ubah_pelanggan($nama,$alamat,$telepon,$email,$pass,$foto,$id)
	{
		$password = sha1($pass);
		$nama_foto = $foto['name'];
		$lokasi_foto = $foto['tmp_name'];
		$fotofiks = date("Y-m-d-H-i-s")."-".$nama_foto;
		if (!empty($lokasi_foto)) 
		{
			$detail =  $this->ambil_pelanggan($id);
			$foto_hapus = $detail['foto_pelanggan'];
			if (file_exists("foto_pelanggan/$foto_hapus")) 
			{
				unlink("foto_pelanggan/$foto_hapus");
			}
			move_uploaded_file($lokasi_foto, "../foto_pelanggan/$fotofiks");
			$this->koneksi->query("UPDATE pelanggan SET email_pelanggan='$email',password_pelanggan='$password',nama_pelanggan='$nama',alamat_pelanggan='$alamat',telepon_pelanggan='$telepon',foto_pelanggan='$fotofiks' WHERE id_pelanggan='$id'");
		}
		else
		{
			$this->koneksi->query("UPDATE pelanggan SET email_pelanggan='$email',password_pelanggan='$password',nama_pelanggan='$nama',alamat_pelanggan='$alamat',telepon_pelanggan='$telepon' WHERE id_pelanggan='$id'");
		}
	}
}

class kategori
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi=$db;
	}
	function tampil_kategori_pencarian()
	{
		$ambil = $this->koneksi->query("SELECT * FROM kategori GROUP BY nama_kategori");
		while($pecah = $ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function tampil_kategori()
	{
		$tampil_kategori = $this->koneksi->query("SELECT * FROM kategori");
		while($pecah_kategori = $tampil_kategori->fetch_assoc())
		{
			$semua_kategori[] = $pecah_kategori;
		}
		return $semua_kategori;
	}
	function tambah_kategori($namakategori,$jenis)
	{
		$this->koneksi->query("INSERT INTO kategori(nama_kategori,jenis_kategori) VALUES('$namakategori','$jenis')");
	}
	function ambil_kategori($id)
	{
		$ambil_kategori = $this->koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id'");
		$pecah = $ambil_kategori->fetch_assoc();
		return $pecah;
	}
	function hapus_kategori($id)
	{
		$this->koneksi->query("DELETE FROM kategori WHERE id_kategori='$id'");
	}
	function ubah_kategori($nama,$jenis,$id)
	{
		$this->koneksi->query("UPDATE kategori SET nama_kategori='$nama', jenis_kategori='$jenis' WHERE id_kategori='$id'");
	}
}

class produk
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi=$db;
	}
	function tampil_produk_halaman($posisi,$batas)
	{
		$semua=array();
		$ambil = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori LIMIT $posisi,$batas");
		while($pecah = $ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function tampil_produk_kategori_pencarian($keyword)
	{
		$semua=array();
		$ambil = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_kategori LIKE '%$keyword%'");
		while($pecah=$ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function cari_produk($keyword)
	{
		$semua=array();
		$ambil = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE nama_produk LIKE '%$keyword%' OR harga_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%' OR jenis_kategori LIKE '%$keyword%' OR nama_kategori LIKE '%$keyword%'");

		while($pecah = $ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function tampil_produk_kategori($id,$jenis)
	{
		$semua=array();
		if ($jenis=="laptop") 
		{
			$ambil = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id' AND kategori.jenis_kategori='$jenis'");
			while($pecah=$ambil->fetch_assoc())
			{
				$semua[]=$pecah;
			}
			return $semua;
		}
		else
		{
			$ambil = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id' AND kategori.jenis_kategori='$jenis'");
			while($pecah=$ambil->fetch_assoc())
			{
				$semua[]=$pecah;
			}
			return $semua;
		}
	}
	function tampil_produk_terbaru()
	{
		$ambil = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY produk.id_produk DESC");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuaterbaru[]=$pecah;
		}
		return $semuaterbaru;
	}
	function tampil_produk()
	{
		$ambil_produk = $this->koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori");
		while($pecah = $ambil_produk->fetch_assoc())
		{
			$semua_produk[]=$pecah;
		}
		return $semua_produk;
	}
	function simpan_produk($idkate,$nama,$harga,$berat,$desk,$foto)
	{
		$nama_foto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$fotofiks = date("Y-m-d-H-i-s")."-".$nama_foto;
		move_uploaded_file($lokasifoto, "../foto_produk/$fotofiks");
		$this->koneksi->query("INSERT INTO produk(id_kategori,nama_produk,harga_produk,berat_produk,deskripsi_produk,foto_produk) VALUES('$idkate','$nama','$harga','$berat','$desk','$fotofiks')");
	}
	function ambil_produk($id)
	{
		$ambil_produk = $this->koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
		$pecah = $ambil_produk->fetch_assoc();
		return $pecah;
	}
	function hapus_produk($id)
	{
		$detail = $this->ambil_produk($id);
		$hapus_produk = $detail['foto_produk'];
		if (file_exists('../foto_produk/$hapus_produk')) 
		{
			unlink('../foto_produk/$hapus_produk');
		}
		$this->koneksi->query("DELETE FROM produk WHERE id_produk='$id'");
	}
	function ubah_produk($idkate,$nama,$harga,$berat,$desk,$foto,$idproduk)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$fotofiks = date("Y-m-d-H-i-s")."-".$namafoto;
		if (empty($lokasifoto)) 
		{
			$this->koneksi->query("UPDATE produk SET id_kategori='$idkate',nama_produk='$nama',harga_produk='$harga',berat_produk='$berat',deskripsi_produk='$desk' WHERE id_produk='$idproduk'");
		}
		else
		{
			move_uploaded_file($lokasifoto, "../foto_produk/$fotofiks");
			$this->koneksi->query("UPDATE produk SET id_kategori='$idkate',nama_produk='$nama',harga_produk='$harga',berat_produk='$berat',deskripsi_produk='$desk',foto_produk='$fotofiks' WHERE id_produk='$idproduk'");
		}
	}
}
class testimoni
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi = $db;
	}
	function tampil_testimoni_terbaru()
	{
		$ambil = $this->koneksi->query("SELECT * FROM testimoni LEFT JOIN pelanggan ON testimoni.id_pelanggan=pelanggan.id_pelanggan ORDER BY testimoni.id_testimoni DESC LIMIT 5");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuatesti[]=$pecah;
		}
		return $semuatesti;
	}
	function tampil_testimoni()
	{
		$semuatesti = $this->koneksi->query("SELECT * FROM testimoni LEFT JOIN pelanggan ON testimoni.id_pelanggan=pelanggan.id_pelanggan");
		while($pecahtesti = $semuatesti->fetch_assoc())
		{
			$datatesti[]=$pecahtesti;
		}
		return $datatesti;
	}
	function simpan_testimoni($isi,$foto,$id)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$fotofix = date("Y-m-d-H-i-s")."-".$namafoto;
		move_uploaded_file($lokasifoto, "foto_testimoni/$fotofix");
		$this->koneksi->query("INSERT INTO testimoni(id_pelanggan,isi_testimoni,foto_testimonni) VALUES('$id','$isi','$fotofix') ");
	}
	
}
class pembelian extends produk
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi=$db;
	}
	function ubah_status_barang_sampai($id_pembelian)
	{
		$status="barang sampai";
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
	}
	function tampil_produk_terlaris()
	{
		$ambil = $this->koneksi->query("SELECT produk.id_produk,pembeliandetail.nama_produk,pembeliandetail.harga_produk,produk.foto_produk, COUNT(pembeliandetail.nama_produk) AS 'banyak' FROM pembeliandetail JOIN produk ON pembeliandetail.nama_produk=produk.nama_produk GROUP BY pembeliandetail.nama_produk ORDER BY banyak DESC");
		while($pecah = $ambil->fetch_assoc())
		{
			$semua[] = $pecah;
		}
		return $semua;
	}
	function tampil_laporan_bulan()
	{
		$bulan = date("m");
		$tahun = date("Y");
		$ambil = $this->koneksi->query("SELECT pelanggan.nama_pelanggan,tanggal_pembelian,total_pembelian FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE MONTH(tanggal_pembelian)='$bulan' AND YEAR(tanggal_pembelian)='$tahun'");
		while($pecah = $ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function konfirmasi_pembayaran($id)
	{
		$status="konfirmasi";
		$tanggal=date("Y-m-d");

		$this->koneksi->query("UPDATE pembayaran SET tanggal_konfirmasi='$tanggal' WHERE id_pembelian='$id'");
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id'");
	}
	function simpan_resi($resi,$id)
	{
		$status="Barang Dikirim";
		$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status', resi='$resi' WHERE id_pembelian='$id'");
	}
	function tampil_keranjang()
	{
		$semua_keranjang=array();
		if (isset($_SESSION['keranjang'])) 
		{
			$keranjang = $_SESSION['keranjang'];
			foreach ($keranjang as $id_produk => $jumlah_produk) 
			{
				$data_keranjang = $this->ambil_produk($id_produk);
				$data_keranjang['jumlah_produk'] = $jumlah_produk;
				$data_keranjang['sub_harga'] = $jumlah_produk*$data_keranjang['harga_produk'];
				$data_keranjang['sub_berat'] = $jumlah_produk*$data_keranjang['berat_produk'];
				$semua_keranjang[] = $data_keranjang;
			}
			return $semua_keranjang;
		}
	}
	function simpan_pembelian($nama_penerima,$tlp_penerima,$alamat,$total_belanja,$total_berat,$nama_provinsi,$nama_kota,$tipe,$kode_pos,$nama_ekspedisi,$nama_paket,$biaya_paket,$lama_paket,$total_bayar,$id_pelanggan,$tanggal_pembelian,$status)
	{
		$this->koneksi->query("INSERT INTO pembelian(id_pelanggan,tanggal_pembelian,status_pembelian,total_belanja,total_ongkir,total_pembelian,provinsi,distrik,tipe,kodepos_pengiriman,ekspedisi_pengiriman,paket_pengiriman,lama_pengiriman,nama_penerima,telepon_penerima,alamat_penerima) VALUES('$id_pelanggan','$tanggal_pembelian','$status','$total_belanja','$biaya_paket','$total_bayar','$nama_provinsi','$nama_kota','$tipe','$kode_pos','$nama_ekspedisi','$nama_paket','$lama_paket','$nama_penerima','$tlp_penerima','$alamat') ");

		$id_pembelian_baru = $this->koneksi->insert_id;

		$keranjang = $this->tampil_keranjang();
		foreach ($keranjang as $key => $value) 
		{
			$nama_produk = $value['nama_produk'];
			$harga_produk = $value['harga_produk'];
			$berat_produk = $value['berat_produk'];
			$jumlah_produk = $value['jumlah_produk'];
			$sub_berat = $value['sub_berat'];
			$sub_harga = $value['sub_harga'];

			$this->koneksi->query("INSERT INTO pembeliandetail(id_pembelian,nama_produk,harga_produk,berat_produk,jumlah_produk,subberat_produk,subharga_produk) VALUES('$id_pembelian_baru','$nama_produk','$harga_produk','$berat_produk','$jumlah_produk','$sub_berat','$sub_harga')");
		}
		unset($_SESSION['keranjang']);

		return $id_pembelian_baru;
	}
	function ambil_pembelian_pelanggan($id_pelanggan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pelanggan='$id_pelanggan'");
		WHILE($pecah = $ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function tampil_pembelian()
	{
		$pembelian = $this->koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
		while($pecahpembelian = $pembelian->fetch_assoc())
		{
			$semuapembelian[]=$pecahpembelian;
		}
		return $semuapembelian;
	}
	function tampil_produk_pembelian($id_pembelian)
	{
		$semuapembelian=array();
		$ambil_pembelian = $this->koneksi->query("SELECT * FROM pembeliandetail WHERE id_pembelian='$id_pembelian'");
		while($pecah = $ambil_pembelian->fetch_assoc())
		{
			$semuapembelian[]=$pecah;
		}
		return $semuapembelian;
	}
	function ambil_pembelian($id_pembelian)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$id_pembelian'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
	function ambil_pembayaran($idpembelian)
	{
		$ambilpembayaran = $this->koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$idpembelian'");
		$pecah = $ambilpembayaran->fetch_assoc();
		return $pecah;
	}
	function simpan_pembayaran($nama,$bank,$tanggalbayar,$total,$bukti,$status,$id)
	{
		$foto = $bukti['name'];
		$lokasifoto = $bukti['tmp_name'];
		$fotofiks = date("Y-m-d-H-i-s")."-".$foto;
		move_uploaded_file($lokasifoto, "bukti_pembayaran/$fotofiks");
		$this->koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,tanggal_bayar,jumlah,bukti) VALUES('$id','$nama','$bank','$tanggalbayar','$total','$fotofiks')");

		$this->koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id'");
	}
}
class pengaturan
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi=$db;
	}
	function tampil_pengaturan()
	{
		$ambil_pengaturan = $this->koneksi->query("SELECT * FROM pengaturan");
		while($pecah_pengaturan = $ambil_pengaturan->fetch_assoc())
		{
			$data_pengaturan[]=$pecah_pengaturan;
		}
		return $data_pengaturan;
	}
	function ambil_pengaturan($idpengaturan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pengaturan WHERE id_pengaturan='$idpengaturan'");
		$pecah = $ambil->fetch_assoc();
		return $pecah;
	}
	function ubah_pengaturan($isi,$idpengaturan)
	{
		$this->koneksi->query("UPDATE pengaturan SET isi='$isi' WHERE id_pengaturan='$idpengaturan'");
	}
}
class blog
{
	public $koneksi;
	function __construct($db)
	{
		$this->koneksi=$db;
	}
	function tampil_blog_terbaru()
	{
		$ambil = $this->koneksi->query("SELECT * FROM blog ORDER BY id_blog DESC");
		while($pecah = $ambil->fetch_assoc())
		{
			$semua[]=$pecah;
		}
		return $semua;
	}
	function tampil_blog()
	{
		$ambilblog = $this->koneksi->query("SELECT * FROM blog");
		while($pecah = $ambilblog->fetch_assoc())
		{
			$semuablog[]=$pecah;
		}
		return $semuablog;
	}
	function ambil_blog($id)
	{
		$detailblog = $this->koneksi->query("SELECT * FROM blog WHERE id_blog='$id'");
		$pecah = $detailblog->fetch_assoc();
		return $pecah;
	}
	function tambah_blog($nama,$deskpen,$deskpan,$tgl,$foto)
	{
		$namafoto = $foto['name'];
		$lokasifoto = $foto['tmp_name'];
		$fotofiks = date("Y-m-d-H-i-s")."-".$namafoto;
		move_uploaded_file($lokasifoto, "../foto_blog/$fotofiks");
		$this->koneksi->query("INSERT INTO blog (nama_blog,deskripsi_pendek,deskripsi_panjang,tanggal_blog,foto_blog) VALUE('$nama','$deskpen','$deskpan','$tgl','$fotofiks')");
	}
}
class apiongkir
{
	function update_provinsi()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 9eea4611b6bd3c60a82d517b03e823a8"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		else 
		{
  // echo $response;
			$dataprovinsi = json_decode($response,TRUE);
			$dataprovinsi = $dataprovinsi['rajaongkir']['results'];
			return $dataprovinsi;
		}
	}
	function update_kota($id_provinsi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=$id_provinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 9eea4611b6bd3c60a82d517b03e823a8"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			// echo $response;
			$datakota = json_decode($response,TRUE);
			$datakota = $datakota['rajaongkir']['results'];
			return $datakota;
		}
	}
	function update_ongkir($id_kota_asal,$id_kota_tujuan,$berat,$ekspedisi)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$id_kota_asal&destination=$id_kota_tujuan&weight=$berat&courier=$ekspedisi",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 9eea4611b6bd3c60a82d517b03e823a8"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
  // echo $response;
			$dataongkir = json_decode($response, TRUE);
			$dataongkir = $dataongkir['rajaongkir']['results']['0']['costs'];
			return $dataongkir;
		}
	}
	
}
$apiongkir = new apiongkir();
$blog = new blog($db);
$pengaturan = new pengaturan($db);
$pembelian = new pembelian($db);
$testimoni = new testimoni($db);
$pelanggan = new pelanggan($db);
$kategori = new kategori($db);
$produk = new produk($db);
?>