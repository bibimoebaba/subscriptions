<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\Subscription;

class SubscriptionTest extends TestCase
{

    use DatabaseTransactions;

    public function testIndexStatusCode(){
        $this->get('subscriptions')
            ->seeStatusCode(200);
    }

    public function testIfIndexRetrievesRightAmountOfData(){
        factory(App\Subscription::class, 10)->create();
        $subscriptions = Subscription::all();
        $this->assertCount(10, $subscriptions);
    }

    public function testShowStatusCode(){
        $first = factory(Subscription::class)->create();
        $this->get('subscriptions/' . $first->id)->seeStatusCode(200);
    }

    public function testIfShowRetrievesRightAmountOfData(){
        $record = factory(Subscription::class)->create();
        $subscription = $this->get('subscriptions/' . $record->id);
        $this->assertCount(1, $subscription);
    }

    public function testIfRightDataIsRetrieved(){
        $record = factory(Subscription::class)->create();
        $this->seeInDatabase('subscriptions', [
            'name'          => $record->name,
            'description'   => $record->description,
            'origin_name'   => $record->origin_name
        ]);
    }

    public function testStoreStatusCode(){
        $record = factory(Subscription::class)->make();
        $this->post('subscriptions',[
            'name'          => $record->name,
            'description'   => $record->description,
            'origin_name'   => $record->origin_name   
            ])
            ->seeStatusCode(200);
    }

    public function testIfRecordsCanBeUpdated(){
        $record = factory(Subscription::class)->create();
        $updatedRecord = factory(App\Subscription::class)->make();
        $subscription = Subscription::findOrFail($record->id);
        $subscription->update([
            'name'          => $updatedRecord->name,
            'description'   => $updatedRecord->description,
            'origin_name'   => $updatedRecord->origin_name
        ]);

        $updsub = Subscription::findOrFail($record->id);
        $this->assertEquals($updsub->name, $updatedRecord->name);
        $this->assertEquals($updsub->description, $updatedRecord->description);
        $this->assertEquals($updsub->origin_name, $updatedRecord->origin_name);
    }

    public function testIfRecordsCanBeDeleted(){
        $record = factory(Subscription::class)->create();
        $response = $this->call('delete', 'subscriptions/' . $record->id);
        $this->notSeeInDatabase('subscriptions', ['deleted_at' => null, 'id' => $record->id]);
    }
}
