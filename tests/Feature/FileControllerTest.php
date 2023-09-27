<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
  public function testUpload() {
    $picture = UploadedFile::fake()->image("deril.jpeg");

    $this->post('/file/upload', [
        'picture' => $picture
    ])->assertSeeText("OK deril.jpeg");
  }
}
