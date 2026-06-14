<?php

namespace Tests\Feature;

use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\Message;
use App\Models\Organization;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectMessageTest extends TestCase
{
    use RefreshDatabase;

    private function makeOrg(string $name = 'Test Church'): Organization
    {
        static $i = 0;
        $i++;

        return Organization::query()->create([
            'name' => $name,
            'slug' => 'test-church-'.$i,
        ]);
    }

    private function makeUser(Organization $org, string $name = 'Test User'): array
    {
        $user = User::factory()->create();
        $profile = Profile::query()->create([
            'organization_id' => $org->id,
            'user_id' => $user->id,
            'display_name' => $name,
            'person_type' => 'Staff',
            'status' => 'Active',
        ]);

        return [$user, $profile];
    }

    private function makeConversation(Organization $org, Profile $a, Profile $b): Conversation
    {
        $conversation = Conversation::create([
            'organization_id' => $org->id,
            'conversation_type' => 'Direct',
            'visibility' => 'Direct',
            'title' => $a->display_name.' & '.$b->display_name,
            'status' => 'Active',
            'created_by_profile_id' => $a->id,
        ]);

        ConversationParticipant::create(['organization_id' => $org->id, 'conversation_id' => $conversation->id, 'profile_id' => $a->id, 'participant_role' => 'member']);
        ConversationParticipant::create(['organization_id' => $org->id, 'conversation_id' => $conversation->id, 'profile_id' => $b->id, 'participant_role' => 'member']);

        return $conversation;
    }

    public function test_user_can_start_a_dm_with_org_member(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');
        [$userB, $profileB] = $this->makeUser($org, 'Bob');

        $response = $this->actingAs($userA)
            ->post(route('messages.store', $profileB));

        $conversation = Conversation::where('conversation_type', 'Direct')->first();
        $this->assertNotNull($conversation);
        $this->assertEquals(2, $conversation->participants()->count());
        $response->assertRedirect(route('conversations.show', $conversation));
    }

    public function test_starting_a_second_dm_reuses_existing_conversation(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');
        [$userB, $profileB] = $this->makeUser($org, 'Bob');

        $this->actingAs($userA)->post(route('messages.store', $profileB));
        $this->actingAs($userA)->post(route('messages.store', $profileB));

        $this->assertEquals(1, Conversation::where('conversation_type', 'Direct')->count());
    }

    public function test_user_cannot_dm_someone_from_different_org(): void
    {
        $orgA = $this->makeOrg('Church A');
        $orgB = $this->makeOrg('Church B');
        [$userA, $profileA] = $this->makeUser($orgA, 'Alice');
        [$userB, $profileB] = $this->makeUser($orgB, 'Bob');

        $this->actingAs($userA)
            ->post(route('messages.store', $profileB))
            ->assertForbidden();
    }

    public function test_user_cannot_dm_themselves(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');

        $this->actingAs($userA)
            ->post(route('messages.store', $profileA))
            ->assertForbidden();
    }

    public function test_conversation_show_renders_messages_in_order(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');
        [$userB, $profileB] = $this->makeUser($org, 'Bob');

        $conversation = $this->makeConversation($org, $profileA, $profileB);

        Message::create(['organization_id' => $org->id, 'conversation_id' => $conversation->id, 'author_profile_id' => $profileA->id, 'body' => 'First message', 'message_type' => 'direct', 'visibility' => 'Direct']);
        Message::create(['organization_id' => $org->id, 'conversation_id' => $conversation->id, 'author_profile_id' => $profileB->id, 'body' => 'Second message', 'message_type' => 'direct', 'visibility' => 'Direct']);

        $this->actingAs($userA)
            ->get(route('conversations.show', $conversation))
            ->assertOk()
            ->assertSeeInOrder(['First message', 'Second message']);
    }

    public function test_reply_creates_message_and_redirects(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');
        [$userB, $profileB] = $this->makeUser($org, 'Bob');

        $conversation = $this->makeConversation($org, $profileA, $profileB);

        $this->actingAs($userA)
            ->post(route('conversations.reply', $conversation), ['body' => 'Hello there!'])
            ->assertRedirect(route('conversations.show', $conversation));

        $this->assertDatabaseHas('messages', [
            'conversation_id' => $conversation->id,
            'author_profile_id' => $profileA->id,
            'body' => 'Hello there!',
        ]);
    }

    public function test_non_participant_cannot_view_conversation(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');
        [$userB, $profileB] = $this->makeUser($org, 'Bob');
        [$userC, $profileC] = $this->makeUser($org, 'Carol');

        $conversation = $this->makeConversation($org, $profileA, $profileB);

        $this->actingAs($userC)
            ->get(route('conversations.show', $conversation))
            ->assertForbidden();
    }

    public function test_viewing_conversation_marks_it_as_read(): void
    {
        $org = $this->makeOrg();
        [$userA, $profileA] = $this->makeUser($org, 'Alice');
        [$userB, $profileB] = $this->makeUser($org, 'Bob');

        $conversation = $this->makeConversation($org, $profileA, $profileB);

        // Ensure last_read_at starts null for Alice
        ConversationParticipant::where('conversation_id', $conversation->id)
            ->where('profile_id', $profileA->id)
            ->update(['last_read_at' => null]);

        $this->actingAs($userA)->get(route('conversations.show', $conversation));

        $participant = ConversationParticipant::where('conversation_id', $conversation->id)
            ->where('profile_id', $profileA->id)
            ->first();

        $this->assertNotNull($participant->last_read_at);
    }
}
