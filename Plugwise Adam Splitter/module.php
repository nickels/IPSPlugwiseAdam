<?php
	class PlugwiseAdamSplitter extends IPSModule {

		public function Create()
		{
			//Never delete this line!
			parent::Create();

			$this->RequireParent("{4CB91589-CE01-4700-906F-26320EFCF6C4}");
		}

		public function Destroy()
		{
			//Never delete this line!
			parent::Destroy();
		}

		public function ApplyChanges()
		{
			//Never delete this line!
			parent::ApplyChanges();
		}

		public function ForwardData($JSONString)
		{
			$data = json_decode($JSONString);
			IPS_LogMessage("Splitter FRWD", utf8_decode($data->Buffer . " - " . $data->RequestMethod . " - " . $data->RequestURL . " - " . $data->RequestData . " - " . $data->Timeout));

			$this->SendDataToParent(json_encode(Array("DataID" => "{D4C1D08F-CD3B-494B-BE18-B36EF73B8F43}", "Buffer" => $data->Buffer, $data->RequestMethod, $data->RequestURL, $data->RequestData, $data->Timeout)));

			return "String data for device instance!";
		}

		public function ReceiveData($JSONString)
		{
			$data = json_decode($JSONString);
			IPS_LogMessage("Splitter RECV", utf8_decode($data->Buffer . " - " . $data->RequestMethod . " - " . $data->RequestURL . " - " . $data->RequestData . " - " . $data->Timeout));

			$this->SendDataToChildren(json_encode(Array("DataID" => "{303A34D4-4C67-F61B-AE8D-CDD6692A80F8}", "Buffer" => $data->Buffer, $data->RequestMethod, $data->RequestURL, $data->RequestData, $data->Timeout)));
		}

	}