<?php

namespace Database\Factories;

use App\Models\Password;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Password>
 */
class PasswordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Password::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => null,
            'title' => $this->faker->word,
            'origin' => $this->faker->url,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
            'comments' => $this->faker->sentence,
            'user_id' => User::factory(),
        ];
    }
}
