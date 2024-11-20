<?php

it('it has no token', function () {
    $response = $this->get('/me');
    $response->assertStatus(404);
});