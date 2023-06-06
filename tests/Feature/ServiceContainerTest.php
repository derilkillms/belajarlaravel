<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
   public function testDependencyInjection()
   {
        //    $foo = new Foo();
        $foo = $this->app->make(Foo::class); // new Foo()
        $foo2 = $this->app->make(Foo::class); // new Foo()

        self::assertEquals("Foo",$foo->foo());
        self::assertEquals("Foo",$foo2->foo());
        self::assertNotSame($foo,$foo2);
   }

   public function testBind()
   {
        $this->app->bind(Person::class,function($app){
            return new Person("Diconic","Academy");
        });

        // $person = $this->app->make(Person::class); // Person()
        // self::assertNotNull($person);
        $person1 = $this->app->make(Person::class); //new Person()
        $person2 = $this->app->make(Person::class); //new Person()
        self::assertEquals("Diconic",$person1->firstname);
        self::assertEquals("Diconic",$person2->firstname);
        self::assertNotSame($person1,$person2);
   }

   public function testSingleton()
   {
        $this->app->singleton(Person::class,function($app){
            return new Person("Diconic","Academy");
        });

        // $person = $this->app->make(Person::class); // Person()
        // self::assertNotNull($person);
        $person1 = $this->app->make(Person::class); //new Person(); if not exist
        $person2 = $this->app->make(Person::class); // return existing Person()
        self::assertEquals("Diconic",$person1->firstname);
        self::assertEquals("Diconic",$person2->firstname);
        self::assertSame($person1,$person2);
   }


   public function testInstance()
   {
        $person = new Person("Diconic","Academy");
        $this->app->instance(Person::class,$person);

        $person1 = $this->app->make(Person::class); //$person
        $person2 = $this->app->make(Person::class); //$person
        self::assertEquals("Diconic",$person1->firstname);
        self::assertEquals("Diconic",$person2->firstname);
        self::assertSame($person1,$person2);
   }

}
