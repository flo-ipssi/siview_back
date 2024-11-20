<?php

use App\Enums\ExpenseCategoryEnum;
use App\Models\Expense;
use App\Models\User;

it('can get list of expenses', function () {
    $user = User::factory()->create();

    $this->actingAs($user, 'api');
    
    $expense = Expense::factory()->create(['user_id' => $user->id]);
    $response = $this->getJson('/api/expense/list');
    $response->assertStatus(200);
    $response->assertJsonCount(1);
    $response->assertJsonFragment([
        'id' => $expense->id,
        'amount' => (string) $expense->amount,
    ]);
});

it('can create an expense', function () {
    $user = User::factory()->create();

    $expense = Expense::factory()->create([
        'user_id' => $user->id,
        'amount' => 50.75,
        'category' => 'Alimentation',
        'description' => 'Achat de nourriture',
        'date' => now()->toDateString(),
    ]);

    $this->assertDatabaseHas('expenses', [
        'user_id' => $user->id,
        'amount' => 50.75,
        'category' => 'Alimentation',
        'description' => 'Achat de nourriture',
    ]);

    
    expect($expense->user_id)->toBeNumeric($user->id);
    expect($expense->amount)->toBe(50.75);
    expect($expense->category)->toBe(ExpenseCategoryEnum::FOOD);
    expect($expense->description)->toBe('Achat de nourriture');
    expect($expense->date)->toBe(now()->toDateString());
});