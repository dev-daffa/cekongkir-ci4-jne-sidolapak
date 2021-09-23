<?php

namespace App\Controllers;
use App\Models\JnedestModel;
class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}
	public function listlampung(){

		$model = new JnedestModel();
		$jne ['detail'] = $model->getListLampung()->getResult();
		$jsondata = json_encode($jne, TRUE);

		// echo ($jsondata);
		$data = json_decode($jsondata, TRUE);
		for ($i=0; $i < count($data['detail']); $i++) { 
			echo "<option></option>";
			echo "<option value='".$data['detail'][$i]['TARIFF_CODE']."'>".$data['detail'][$i]['DISTRICT_NAME']." - ".$data['detail'][$i]['CITY_NAME']."</option>";
		}

    }

	public function listbandung(){

		$model = new JnedestModel();
		$jne ['detail'] = $model->getListBandung()->getResult();
		$jsondata = json_encode($jne, TRUE);

		// echo ($jsondata);
		$data = json_decode($jsondata, TRUE);
		for ($i=0; $i < count($data['detail']); $i++) { 
			echo "<option></option>";
			echo "<option value='".$data['detail'][$i]['TARIFF_CODE']."'>".$data['detail'][$i]['DISTRICT_NAME']." - ".$data['detail'][$i]['CITY_NAME']."</option>";
		}

    }

	public function tariflampung(){

		\YusufTheDragon\JNE\JNE::setUsername('USER')->setApiKey('API')->setProductionMode(true);
		$kota_tujuan = $_POST['kota_tujuan'];
		$params = [
			'from' => 'TKG10000',
			'thru' => $kota_tujuan,
			'weight' => 1
		];
		$tarif  = \YusufTheDragon\JNE\Fare::getFares($params);
		foreach($tarif->price as $trf):
			{
			if( $trf->service_display == 'REG' ){
			echo "<p> Tujuan: " . $trf->destination_name;
			echo "<p> Service: " . $trf->service_display;
			echo "<p> Ongkir: " . $trf->price;
			echo "<p> Estimasi: " . $trf->etd_from .  " - " .$trf->etd_thru . " Hari";
			break;
			}

			if( $trf->service_display == 'CTC' ){
				echo "<p> Tujuan: " . $trf->destination_name;
				echo "<p> Service: " . $trf->service_display;
				echo "<p> Ongkir: " . $trf->price;
				echo "<p> Estimasi: " . $trf->etd_from .  " - " .$trf->etd_thru . " Hari";
				break;
				}

			}
		endforeach;
		
		$data = array(
		'tarif' => $tarif
		);
	}


	public function tarifbandung(){

		\YusufTheDragon\JNE\JNE::setUsername('USER')->setApiKey('API')->setProductionMode(true);
		$kota_tujuan = $_POST['kota_tujuan'];
		$params = [
			'from' => 'BDO10000',
			'thru' => $kota_tujuan,
			'weight' => 1
		];
		$tarif  = \YusufTheDragon\JNE\Fare::getFares($params);
		foreach($tarif->price as $trf):
			{
			if( $trf->service_display == 'REG' ){
			echo "<p> Tujuan: " . $trf->destination_name;
			echo "<p> Service: " . $trf->service_display;
			echo "<p> Ongkir: " . $trf->price;
			echo "<p> Estimasi: " . $trf->etd_from .  " - " .$trf->etd_thru . " Hari";
			break;
			}

			if( $trf->service_display == 'CTC' ){
				echo "<p> Tujuan: " . $trf->destination_name;
				echo "<p> Service: " . $trf->service_display;
				echo "<p> Ongkir: " . $trf->price;
				echo "<p> Estimasi: " . $trf->etd_from .  " - " .$trf->etd_thru . " Hari";
				break;
				}

			}
		endforeach;
		
		$data = array(
		'tarif' => $tarif
		);
	}
}
