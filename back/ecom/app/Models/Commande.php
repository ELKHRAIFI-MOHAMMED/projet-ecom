<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table='commande';
    protected $primaryKey='id_commande';
    protected $fillable=['prix','quantite','prix_livraison','status','commentaire','numero','id_produit','date_commande',"prix_retour","date_livraison"];
    public $timestamps=false;

    public function produit(){
        return $this->belogsTo(Produit::class,'id_produit','id_produit');
    }
    public function client(){
        return $this->belogsTo(Client::class,'numero','numero');
    }
    use HasFactory;
}