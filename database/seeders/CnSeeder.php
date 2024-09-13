<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'name' => 'Pale complexion and skin lack luster',
                'cn_name' => '面部缺乏光泽，嘴唇和指甲苍白',
            ],
            [
                'name' => 'Dry hair, lips and skin',
                'cn_name' => '头发、皮肤干燥',
            ],
            [
                'name' => 'Concerned about gray hair and hair loss',
                'cn_name' => '很介意白发和脱发',
            ],
            [
                'name' => 'Fragile nails, nails turning white, prominent lines on nails',
                'cn_name' => '指甲很脆弱',
            ],
            [
                'name' => 'Severe coldness in fingers and toes',
                'cn_name' => '手指、脚趾很冰凉',
            ],
            [
                'name' => 'Frequent dizziness',
                'cn_name' => '经常头晕',
            ],
            [
                'name' => 'Unable to fall sleep or often dreaming and unable to sleep deeply',
                'cn_name' => '无睡不着，或经常做梦无法熟睡',
            ],
            [
                'name' => 'Prone to reddish black acne & pimples',
                'cn_name' => '容易长红黑色粉刺和疹子',
            ],
            [
                'name' => 'Concerned about dark spots on the face and limbs',
                'cn_name' => '很介意脸上和四肢上的色斑',
            ],
            [
                'name' => 'Eye bags often appear under the eyes',
                'cn_name' => '黑眼圈很重',
            ],
            [
                'name' => 'Dull skin complexion or and lip color tone',
                'cn_name' => '肤色发黑，嘴唇发黑',
            ],
            [
                'name' => 'My fingers and toes are cold, but my head feels hot.',
                'cn_name' => '手指脚趾冰凉，但大脑充血发烫',
            ],
            [
                'name' => 'Have symptoms of chronic headaches and stiff shoulders',
                'cn_name' => '慢性头痛，肩膀僵硬',
            ],
            [
                'name' => 'Severe menstrual pain',
                'cn_name' => '痛经很难受',
            ],
            [
                'name' => 'Feeling tired & sleepy immediately after meals',
                'cn_name' => '身体倦怠，进食后马上犯困',
            ],
            [
                'name' => 'Easily fatigue',
                'cn_name' => '容易疲倦',
            ],
            [
                'name' => 'Low metabolism',
                'cn_name' => '常常感到烦躁',
            ],
            [
                'name' => 'Easy to catch a cold',
                'cn_name' => '容易感冒',
            ],
            [
                'name' => 'Sweat easily, and sweat profusely even after moving a little',
                'cn_name' => '出汗多，稍微活动一下就出汗',
            ],
            [
                'name' => 'Difficulty getting up in the morning',
                'cn_name' => '早上起床很困难',
            ],
            [
                'name' => 'Prone to feeling cold than others',
                'cn_name' => '比其他人怕冷',
            ],
            [
                'name' => 'Breast swelling and tender before menstruation',
                'cn_name' => '月经前乳房胀痛 经前期综合征严',
            ],
            [
                'name' => 'Severe PMS (mood swings, breast swelling, etc.)',
                'cn_name' => '易出现经前不适（情绪波动重 、乳房胀痛等）',
            ],
            [
                'name' => 'Easily agitated',
                'cn_name' => '常常感到烦躁',
            ],
            [
                'name' => 'Prone to fatigue',
                'cn_name' => '很容易疲倦',
            ],
            [
                'name' => 'Easily bloated and prone to burping',
                'cn_name' => '经常腹胀，爱打嗝',
            ],
            [
                'name' => 'Trouble sleeping',
                'cn_name' => '难以入睡',
            ],
            [
                'name' => 'The body is easily swell / water retention in the body',
                'cn_name' => '身体经常浮肿',
            ],
            [
                'name' => 'Body feeling heavy and weak',
                'cn_name' => '身体沉重、倦怠',
            ],
            [
                'name' => 'Feel unwell when the weather is going to rain or the air pressure is low.',
                'cn_name' => '在雨天或低气压接近时身体感到不适',
            ],
            [
                'name' => 'Prone to motion sickness',
                'cn_name' => '容易晕车',
            ],
            [
                'name' => 'Frequency or infrequent urination',
                'cn_name' => '小便次数多，或少',
            ],
            [
                'name' => 'Mouth becomes dry when talking, leads to frequent drinking.',
                'cn_name' => '聊天时口干舌燥，饮料必不可少',
            ],
        ];

        $surveys = [
            [
                'name' => 'Blood Deficient',
                'cn_name' => '血瘀',
            ],
            [
                'name' => 'Blood Stagnant',
                'cn_name' => '血滞 ',
            ],
            [
                'name' => 'Qi Deficient',
                'cn_name' => '气瘀  ',
            ],
            [
                'name' => 'Qi Stagnant',
                'cn_name' => '气滞',
            ],
            [
                'name' => 'Water Stagnant',
                'cn_name' => '水滞',
            ],
        ];




        foreach ($questions as $question) {
            DB::table('questions')
                ->where('name', $question['name'])
                ->update(['cn_name' => $question['cn_name']]);
        }

        foreach ($surveys as $question) {
            DB::table('surveys')
                ->where('name', $question['name'])
                ->update(['cn_name' => $question['cn_name']]);
        }
    }
}
