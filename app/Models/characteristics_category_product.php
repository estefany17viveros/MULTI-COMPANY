<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\category;
use App\Models\characteristics;

class characteristics_category_product extends Model
{
    /** @use HasFactory<\Database\Factories\CharacteristicsCategoryProductFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'characteristics_id',
    ];

    protected $allowSort = [
        'product_id',
        'category_id',
        'characteristics_id',
    ];

    protected $allowFilter = [
        'product_id',
        'category_id',
        'characteristics_id',
    ];


    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function characteristics()
    {
        return $this->belongsTo(characteristics::class, 'characteristic_id');
    }

    public function scopeIncluded(Builder $query)
    {
        $allowIncluded = $this->getAllowIncluded();

        if (empty($allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));

        foreach ($relations as $key => $relation) {
            if (!in_array($relation, $allowIncluded)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

     public function scopeFilter(Builder $query)
    {

        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');

        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {

            if ($allowFilter->contains($filter)) {

                $query->where($filter, 'LIKE', '%' . $value . '%');//nos retorna todos los registros que conincidad, asi sea en una porcion del texto
            }
        }

    }

    public function scopeSort(Builder $query)
    {

     if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

      foreach ($sortFields as $sortField) {

            $direction = 'asc';

            if(substr($sortField, 0,1)=='-'){ //cambiamos la consulta a 'desc'si el usuario antecede el menos (-) en el valor de la variable sort
                $direction = 'desc';
                $sortField = substr($sortField,1);//copiamos el valor de sort pero omitiendo, el primer caracter por eso inicia desde el indice 1
            }
            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);//ejecutamos la query con la direccion deseada sea 'asc' o 'desc'
            }
        }
    }

    public function scopeGetOrPaginate(Builder $query)
    {
      if (request('perPage')) {
            $perPage = intval(request('perPage'));//transformamos la cadena que llega en un numero.

            if($perPage){//como la funcion intval retorna 0 si no puede hacer la conversion 0  es = false
                return $query->paginate($perPage);//retornamos la cuonsulta de acuerdo a la ingresado en la vaiable $perPage
            }
         }
           return $query->get();//sino se pasa el valor de $perPage en la URL se pasan todos los registros.
    }
}
