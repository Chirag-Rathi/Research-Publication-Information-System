<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicationJournalModel extends Model
{
   protected $table = "publicationjournal";
   public $timestamps = false;
   public $primarykey = "paperId";
}
