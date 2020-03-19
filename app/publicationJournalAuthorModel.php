<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicationJournalAuthorModel extends Model
{
   protected $table = "journalauthors";
   public $timestamps = false;
   protected $primarykey = "id";
}
