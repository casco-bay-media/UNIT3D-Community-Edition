<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

use App\Http\Controllers\RequestController;
use App\Http\Requests\StoreTorrentRequestRequest;
use App\Http\Requests\UpdateTorrentRequestRequest;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Resolution;
use App\Models\TorrentRequest;
use App\Models\Tv;
use App\Models\Type;
use App\Models\User;

test('create returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $category = Category::factory()->create();
    $categories = Category::factory()->times(3)->create();
    $types = Type::factory()->times(3)->create();
    $resolutions = Resolution::factory()->times(3)->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('requests.create'));

    $response->assertOk();
    $response->assertViewIs('requests.create');
    $response->assertViewHas('categories', $categories);
    $response->assertViewHas('types', $types);
    $response->assertViewHas('resolutions', $resolutions);
    $response->assertViewHas('user', $user);
    $response->assertViewHas('category_id');
    $response->assertViewHas('title');
    $response->assertViewHas('imdb');
    $response->assertViewHas('tmdb');
    $response->assertViewHas('mal');
    $response->assertViewHas('tvdb');
    $response->assertViewHas('igdb');

    // TODO: perform additional assertions
});

test('destroy returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $torrentRequest = TorrentRequest::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->delete(route('requests.destroy', [$torrentRequest]));

    $response->assertOk();
    $this->assertModelMissing($torrentRequest);

    // TODO: perform additional assertions
});

test('destroy aborts with a 403', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $torrentRequest = TorrentRequest::factory()->create();
    $user = User::factory()->create();

    // TODO: perform additional setup to trigger `abort_unless(403)`...

    $response = $this->actingAs($user)->delete(route('requests.destroy', [$torrentRequest]));

    $response->assertForbidden();
});

test('edit returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $torrentRequest = TorrentRequest::factory()->create();
    $categories = Category::factory()->times(3)->create();
    $types = Type::factory()->times(3)->create();
    $resolutions = Resolution::factory()->times(3)->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('requests.edit', [$torrentRequest]));

    $response->assertOk();
    $response->assertViewIs('requests.edit');
    $response->assertViewHas('categories', $categories);
    $response->assertViewHas('types', $types);
    $response->assertViewHas('resolutions', $resolutions);
    $response->assertViewHas('user', $user);
    $response->assertViewHas('torrentRequest', $torrentRequest);

    // TODO: perform additional assertions
});

test('index returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('requests.index'));

    $response->assertOk();
    $response->assertViewIs('requests.index');

    // TODO: perform additional assertions
});

test('show returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $torrentRequest = TorrentRequest::factory()->create();
    $tv = Tv::factory()->create();
    $movie = Movie::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('requests.show', [$torrentRequest]));

    $response->assertOk();
    $response->assertViewIs('requests.show');
    $response->assertViewHas('torrentRequest', $torrentRequest);
    $response->assertViewHas('user', $user);
    $response->assertViewHas('meta');

    // TODO: perform additional assertions
});

test('store validates with a form request', function (): void {
    $this->assertActionUsesFormRequest(
        RequestController::class,
        'store',
        StoreTorrentRequestRequest::class
    );
});

test('store returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('requests.store'), [
        // TODO: send request data
    ]);

    $response->assertOk();

    // TODO: perform additional assertions
});

test('update validates with a form request', function (): void {
    $this->assertActionUsesFormRequest(
        RequestController::class,
        'update',
        UpdateTorrentRequestRequest::class
    );
});

test('update returns an ok response', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $torrentRequest = TorrentRequest::factory()->create();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->patch(route('requests.update', [$torrentRequest]), [
        // TODO: send request data
    ]);

    $response->assertOk();

    // TODO: perform additional assertions
});

test('update aborts with a 403', function (): void {
    $this->markTestIncomplete('This test case was generated by Shift. When you are ready, remove this line and complete this test case.');

    $torrentRequest = TorrentRequest::factory()->create();
    $user = User::factory()->create();

    // TODO: perform additional setup to trigger `abort_unless(403)`...

    $response = $this->actingAs($user)->patch(route('requests.update', [$torrentRequest]), [
        // TODO: send request data
    ]);

    $response->assertForbidden();
});

// test cases...