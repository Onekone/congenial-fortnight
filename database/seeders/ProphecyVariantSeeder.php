<?php

namespace Database\Seeders;

use App\Models\ProphecyVariant;
use Illuminate\Database\Seeder;

class ProphecyVariantSeeder extends Seeder
{
    /** @var string[] */
    protected array $data = [
        'Да',
        'Нет',
        'Возможно',
        'Вопрос не ясен',
        'Абсолютно точно',
        'Никогда',
        'Даже не думай',
        'Сконцентрируйся и спроси опять',
    ];

    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $output = $this->command->getOutput();

        $output->progressStart();
        foreach ($this->data as $content) {
            ProphecyVariant::create(['content' => $content]);
            $output->progressAdvance();
        }

        $output->progressFinish();

    }
}
