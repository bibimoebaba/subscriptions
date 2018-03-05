<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\SubscriptionRule;

class SubscriptionRuleTest extends TestCase
{
    
	use DatabaseTransactions;

    public function testIndexStatusCode(){
        $this->get('products')
            ->seeStatusCode(200);
    }

    public function testIfIndexRetrievesRightAmountOfData(){
        factory(Product::class, 10)->create();
        $products = Product::all();
        $this->assertCount(10, $products);
    }

    public function testShowStatusCode(){
        $first = factory(Product::class)->create();
        $this->get('products/' . $first->id)->seeStatusCode(200);
    }

    public function testIfShowRetrievesRightAmountOfData(){
        $record = factory(Product::class)->create();
        $product = $this->get('products/' . $record->id);
        $this->assertCount(1, $product);
    }

    public function testIfRightDataIsRetrieved(){
        $record = factory(Product::class)->create();
        $this->seeInDatabase('products', [
            'name'          => $record->name,
            'description'   => $record->description
        ]);
    }

    public function testStoreStatusCode(){
        $record = factory(Product::class)->make();
        $this->post('products', [
            'name'          => $record->name,
            'description'   => $record->description  
            ])
            ->seeStatusCode(200);
    }

    public function testIfRecordsCanBeUpdated(){
        $record = factory(Product::class)->create();
        $updatedRecord = factory(Product::class)->make();
        $product = Product::findOrFail($record->id);
        $product->update([
            'name'          => $updatedRecord->name,
            'description'   => $updatedRecord->description
        ]);

        $updrec = Product::findOrFail($record->id);
        $this->assertEquals($updrec->name, $updatedRecord->name);
        $this->assertEquals($updrec->description, $updatedRecord->description);
    }

    public function testIfRecordsCanBeDeleted(){
        $record = factory(Product::class)->create();
        $response = $this->call('delete', 'products/' . $record->id);
        $this->notSeeInDatabase('products', ['deleted_at' => null, 'id' => $record->id]);
    }
}
