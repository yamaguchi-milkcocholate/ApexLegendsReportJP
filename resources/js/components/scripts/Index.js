export default {
    data: function() {
        return {
            search: "",
            your_id: "",
            your_email: "",
            your_first_name: "",
            your_last_name: "",
            hacker_id: "",
            message: "",
            hacker_check: {
                "SpeedHack": false,
                "WallHack": false,
                "Chams": false,
                "NoRecoil": false,
                "AutoAim": false,
                "OneHitKill": false,
                "Macro": false,
                "MotionCut": false,
                "ESP": false
            },
            hacker_message: "",
            cheating: {
                "SpeedHack": "加速チート",
                "WallHack": "ウォールハック",
                "Chams": "着色",
                "NoRecoil": "無反動",
                "AutoAim": "オートエイム",
                "OneHitKill": "ワンヒットキル",
                "Macro": "マクロ",
                "MotionCut": "モーションカット",
                "ESP": "ESP表示"
            },
            cheating_description:{
                "SpeedHack": "移動速度をあげて行動できる",
                "WallHack": "壁が透けて見える",
                "Chams": "物体やプレイヤーに色が着いて見えやすくなる",
                "NoRecoil": "武器の反動がない",
                "AutoAim": "自動的にプレイヤーの頭部に照準が合う",
                "OneHitKill": "一発の銃弾で敵を倒せる",
                "Macro": "異常な高速タップなど不可能な動作をワンクリックで行える",
                "MotionCut": "武器の持ち替えなどの動作をなくす",
                "ESP": "プレイヤーの体力や距離などの情報が表示される"
            },
            hacker_players:[
                'hacker-1',
                'hacker-2',
                'hacker-3',
                'hacker-1',
                'hacker-2',
                'hacker-3',
                'hacker-1',
                'hacker-2',
                'hacker-3',
                'hacker-1',
                'hacker-2',
                'hacker-3',
                'hacker-1',
                'hacker-2',
                'hacker-3',
            ],
        };
    },
    methods: {
        getHackerIdFromCard: function (hackerId) {
            this.hacker_id = hackerId
        },
        setYou: function() {
            let tmp = this.$localStorage.get('register_id', null);
            if(tmp === null ||  tmp === 'undefined')
                this.your_id = "";
            else
                this.your_id = tmp;

            tmp = this.$localStorage.get('register_first_name', null);
            if(tmp === null ||  tmp === 'undefined')
                this.your_first_name = "";
            else
                this.your_first_name = tmp;

            tmp = this.$localStorage.get('register_last_name', null);
            if(tmp === null ||  tmp === 'undefined')
                this.your_last_name = "";
            else
                this.your_last_name = tmp;

            tmp = this.$localStorage.get('register_email', null);
            if(tmp === null ||  tmp === 'undefined')
                this.your_email = "";
            else
                this.your_email = tmp;
        },
        modalCancel: function () {
            console.log('cancel')
        },
        modalOk: function () {
            console.log('ok')
        },
        modalShown: function () {
            this.hacker_message = "";
            this.hacker_message += (this.hacker_id+"\n------------")
        }
    },
    mounted () {
        this.setYou();
    }
};
