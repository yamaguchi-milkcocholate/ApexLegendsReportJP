export default {
    computed: {
        selectCheckBox: function () {
            console.log(this.hacker_message);
            this.setMessage();
            return this.hacker_check.length > 0
        }
    },
    data: function() {
        return {
            search: "",
            your_id: "",
            your_email: "",
            your_first_name: "",
            your_last_name: "",
            your_message: "",
            hacker_id: "",
            hacker_check: [],
            hacker_message: "",
            cheating : [
                {key: "SpeedHack", value: "加速チート", text: "移動速度をあげて行動できる"},
                {key: "WallHack", value: "ウォールハック", text: "壁が透けて見える"},
                {key: "Chams", value: "着色", text: "物体やプレイヤーに色が着いて見えやすくなる"},
                {key: "NoRecoil", value: "無反動", text: "武器の反動がない"},
                {key: "AutoAim", value: "オートエイム", text: "自動的にプレイヤーの頭部に照準が合う"},
                {key: "OneHitKill", value: "ワンヒットキル", text: "一発の銃弾で敵を倒せる"},
                {key: "Macro", value: "マクロ", text: "異常な高速タップなど不可能な動作をワンクリックで行える"},
                {key: "MotionCut", value: "モーションカット", text: "武器の持ち替えなどの動作をなくす"},
                {key: "ESP", value: "ESP表示", text: "プレイヤーの体力や距離などの情報が表示される"},
            ],
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
        modalOk: function () {
            console.log('ok');
            let url = location.href + 'api/v0/report';
            console.log(url);
            let params = {
                id: this.your_id,
                email: this.your_email,
                first_name: this.your_first_name,
                last_name: this.your_last_name,
                message: this.hacker_message
            };
            (async () => {
                let response = await this.$axios.get(url, params);
                console.log(response);
            })();
        },
        modalShown: function () {
            this.hacker_check = [];
            this.initMessage()
        },
        setMessage: function () {
            this.initMessage();
            for(let i=0; i<this.hacker_check.length; i++) {
                let select = this.hacker_check[i];
                let cheat = this.cheating.filter((item) => {
                    return item.key === select
                });
                this.hacker_message += (cheat[0].text+"\n");
            }
            this.hacker_message += ("\n"+this.your_message+"\n");
        },
        initMessage: function () {
            this.your_message = "";
            this.hacker_message = "";
            this.hacker_message += (this.hacker_id+"\n------------\n")
        }
    },
    mounted () {
        this.setYou();
    }
};
