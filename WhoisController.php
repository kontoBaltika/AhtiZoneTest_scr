<?php

namespace App\Http\Controllers;

use Iodev\Whois\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\whois;

class WhoisController extends Controller
{
    protected function getWhois($domain=null){
        if(strlen($domain) === 0){
            return response('Palun kirjuta URL-i lõppu kaldkriipsuga eraldatult domeen mida otsid', Response::HTTP_OK);
        }
        $whois = Factory::get()->createWhois();
        $response = $whois->loadDomainInfo($domain);
        if($response){
            $domainAlias = whois::where('Domain', $domain)->get();
            if(count($domainAlias) > 0){
                return response('Domeeni omanik on '.$domainAlias[0]['DomainAlias'], Response::HTTP_OK);
            }else{               
                return response('Domeeni omanik on '.$response->owner, Response::HTTP_OK);
            }            
        }else{
            return response('Sellist domeeni ei ole registreeritud', Response::HTTP_OK);
        }
    }

    protected function renameWhois($domain,$domainAlias){
        $whois = Factory::get()->createWhois();
        $response = $whois->loadDomainInfo($domain);
        if($response->owner){
            whois::updateOrCreate(['Domain'=>$domain],['DomainName'=>$response->owner,'DomainAlias'=>$domainAlias]);
            return response('Domeeni nimi '.$response->owner.' edukalt asendatud aliasega '.$domainAlias, Response::HTTP_OK);
        }else{
            return response('Sellist domeeni ei ole registreeritud', Response::HTTP_OK);
        }
        
    }
}
