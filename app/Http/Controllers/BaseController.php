<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
class BaseController extends Controller
{
    
    
    private function fetchValue($value){
        if(is_string($value)){
            switch($value){
                case 'DateNow':
                    return new DateTime();
                    break;
                default:
                    return $value;
                    break;
            }
        }
        return $value;
    }

    protected function buildQuery($query){
        if(Input::has('select')){
            $select = Input::all()['select'];
            $query = $query->select($select);
        }
        if(Input::has('where')){
            $where = json_decode(Input::all()['where']);
            foreach ($where as $opt) {
                switch ($opt->func){
                    //TODO:
                    //-check $opt object for values such as field, operator and value
                    case 'where':
                        $query = $query->where($opt->field, $opt->operator, $this->fetchValue($opt->value));
                        break;
                    case 'whereIn':
                        $query = $query->whereIn($opt->field, json_decode($opt->value));
                        break;
                    case 'whereNotIn':
                        $query = $query->whereNotIn($opt->field, json_decode($opt->value));
                        break;
                    case 'orWhere':
                        $query = $query->orWhere(function($query) use ($opt){
                            $query->where($opt->field, $opt->operator, $this->fetchValue($opt->value));
                        });
                        break;
                }
            }
        }
        if(Input::has('skip')){
            $skip = Input::all()['skip'];
            $query = $query->skip($skip);
        }
        if(Input::has('limit')){
            $limit = Input::all()['limit'];
            $query->take($limit);
        }
        return $query;
    }

}
