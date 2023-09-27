<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Crypt;


class EncryptionTest extends TestCase
{
   public function testEncryption() {

    $encrypt = Crypt::encrypt('Muhammad Deril');
    var_dump($encrypt);

    $decrypt = Crypt::decrypt($encrypt);
    self::assertEquals('Muhammad Deril', $decrypt);

   }
}
