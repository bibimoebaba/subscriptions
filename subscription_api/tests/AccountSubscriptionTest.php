<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use App\AccountSubscription as accSub;

class ProductTest extends TestCase
{
    
	use DatabaseTransactions;

    public function testIndexStatusCode(){
        $this->get('account/subscriptions')
            ->seeStatusCode(200);
    }

    public function testIfIndexRetrievesRightAmountOfData(){
        factory(App\Subscription::class)->create();

        factory(accSub::class, 10)->create();
        $accsubs = accSub::all();
        $this->assertCount(10, $accsubs);
    }

    public function testShowStatusCode(){
        factory(App\Subscription::class)->create();
        $first = factory(accSub::class)->create();
        $this->get('account/subscriptions/' . $first->id)->seeStatusCode(200);
    }

    public function testIfShowRetrievesRightAmountOfData(){
        factory(App\Subscription::class)->create();

        $record = factory(accSub::class)->create();
        $product = $this->get('account/subscriptions/' . $record->id);
        $this->assertCount(1, $product);
    }

    public function testIfRightDataIsRetrieved(){
        factory(App\Subscription::class)->create();

        $record = factory(accSub::class)->create();
        $this->seeInDatabase('account_subscriptions', [
            'account_id'        => $record->account_id,
            'subscription_id'   => $record->subscription_id,
            'origin_name'       => $record->origin_name
        ]);
    }

    public function testStoreStatusCode(){
        factory(App\Subscription::class)->create();

        $record = factory(accSub::class)->make();
        $this->post('account/subscriptions', [
            'account_id'        => $record->account_id,
            'subscription_id'   => $record->subscription_id,
            'origin_name'       => $record->origin_name 
            ])
            ->seeStatusCode(200);
    }

    public function testIfRecordsCanBeUpdated(){
        factory(App\Subscription::class)->create();

        $record = factory(accSub::class)->create();
        $updatedRecord = factory(accSub::class)->make();
        $accountSubscription = accSub::findOrFail($record->id);
        $accountSubscription->update([
            'account_id'        => $updatedRecord->account_id,
            'subscription_id'   => $updatedRecord->subscription_id,
            'origin_name'       => $updatedRecord->origin_name
        ]);

        $updrec = accSub::findOrFail($record->id);
        $this->assertEquals($updrec->account_id, $updatedRecord->account_id);
        $this->assertEquals($updrec->subscription_id, $updatedRecord->subscription_id);
        $this->assertEquals($updrec->origin_name, $updatedRecord->origin_name);
    }

    public function testIfRecordsCanBeDeleted(){
        factory(App\Subscription::class)->create();

        $record = factory(accSub::class)->create();
        $response = $this->call('delete', 'account/subscriptions/' . $record->id);
        $this->notSeeInDatabase('account_subscriptions', ['deleted_at' => null, 'id' => $record->id]);
    }
}
