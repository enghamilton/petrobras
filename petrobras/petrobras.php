<?php

# Use the Curl extension to query Google and get back a page of results
$url = "http://www.cesgranrio.org.br/concursos/principal.aspx";
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);

//$concursos = array("evento.aspx?id=transpetro0118","evento.aspx?id=petrobras0118","evento.aspx?id=petrobras0217","evento.aspx?id=transpetro0117","evento.aspx?id=petrobras0117");

$concursos = array("evento.aspx?id=petrobras0218","evento.aspx?id=petrobras0318","evento.aspx?id=petrobras0119","evento.aspx?id=petrobras0219","evento.aspx?id=petrobras0319");

# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
@$dom->loadHTML($html);

# Iterate over all the <a> tags
foreach($dom->getElementsByTagName('a') as $link) {
    if(in_array($link->getAttribute('href'),$concursos)){
        # Show the <a href>    
        echo $link->getAttribute('href');
        echo "<br />";
        
        // the message
        $msg = "Abertura concursos\nver cesgranrio ";
        // send email
        //mail("hamilton.kamiya@hotmail.com","php concurso petrobras",$msg);
		
		$to = "hamiltonkamiya@gmail.com";
		$subject = "Fazer concurso petrobras";
		$msg = "ver url http://www.cesgranrio.org.br senha ayimak CPF 336.399.458-32";
		$headers = "From: 000webhost@example.com" . "\r\n" .
		"CC: hamiltonkamiya@outlook.com";

		mail($to,$subject,$msg,$headers);
        
    }
    
}
?>