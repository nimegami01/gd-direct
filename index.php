// $id, silahkan isi dengan id google drivenya
// Contoh : https://drive.google.com/open?id=1dVzKf7HwS9MZ4aEbEPJhfgmGlPHbGNii
// Idnya = 1dVzKf7HwS9MZ4aEbEPJhfgmGlPHbGNii
// Masukan id gd ke variable $id
// Jadi pada script dibawah seperti berikut :
/*
$ch=curl_init("https://drive.google.com/uc?id=1dVzKf7HwS9MZ4aEbEPJhfgmGlPHbGNii&confirm=jYel&authuser=0&export=download");
*/

$ch=curl_init("https://drive.google.com/uc?id=".$id."&confirm=jYel&authuser=0&export=download");

curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");curl_setopt($ch,CURLOPT_POSTFIELDS,[]);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);curl_setopt($ch,CURLOPT_ENCODING,"");
curl_setopt($ch,CURLOPT_HTTPHEADER,array("Accept: */*","Accept-encoding: gzip, deflate, br","Accept-language: en-GB,en-US;q=0.9,en;q=0.8","Content-length: 0","Content-type: application/x-www-form-urlencoded;charset=UTF-8","Origin: https://drive.google.com","Referer: https://drive.google.com/drive/my-drive","User-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36","X-chrome-connected: id=102224796319835333482,mode=0,enable_account_consistency=false","X-client-data: CIa2yQEIpbbJAQipncoBCKijygEYkqPKAQ==","X-drive-first-party: DriveWebUi","X-json-requested: true",));

$result=curl_exec($ch);

// Cek result valid/tidak
if($result){

$object=json_decode(str_replace(")]}'","",$result));

// DOWNLOAD URL
$dl=$object->downloadUrl;

// GET FILENAME
$nm=$object->fileName;

// GET SIZE
$sz=$object->sizeBytes;

}

// SIZE FUNCTION

function size($bytes){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
// CALLBACK : size(var) / example size($sz)
