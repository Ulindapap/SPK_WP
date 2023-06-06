<!DOCTYPE html>
<html>

<head>
    <title>Sistem Pendukung Keputusan Pengambilan Mata Kuliah Pilihan Metode WP</title>
</head>
<style>
table {
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
}
</style>

<body>

    <h4>Hasil Akhir Perankingan</h4>
    <table border="1" width="100%">
        <thead>
            <tr align="center">
                <th>Nama Mata Kuliah</th>
                <th>Nilai</th>
                <th width="15%">Ranking</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php
			$no=1;
			foreach ($hasil_wp as $keys): ?>
		<tr align="center">
			<td align="left">
				<?php
				$nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
				echo $nama_alternatif['nama'];
				?>
			
			</td>
			<td><?= $keys->nilai ?></td>
			<td><?= $no; ?></td>
		</tr>
		<?php
			$no++;
			endforeach ?> -->
            <?php
                    // logic untuk mengambil nilai dan sorting secara desc 
						$no=1;
                        $dataArray = [];
                        $data = json_decode($hasil_wp->dataAkhir);
                        foreach($data as $key => $val) {
                            array_push($dataArray, [$key => $val]);
                        }
                        asort($dataArray);
						foreach ($dataArray as $key => $value): ?>
            <?php foreach ($value as $index => $val) :?>
            <tr align="center">
                <td align="left">
                    <?php
                            $this->db->where('id_alternatif', $index);
                            $alternatif = $this->db->get('alternatif')->row();
                            echo $alternatif->nama;
							?>

                </td>
                <td><?= $val ?></td>
                <td><?= $no; ?></td>
            </tr>
            <?php endforeach ?>
            <?php
						$no++;
						endforeach ?>
        </tbody>
    </table>
    <script>
    window.print();
    </script>
</body>

</html>