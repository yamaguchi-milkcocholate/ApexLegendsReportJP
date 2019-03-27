<template>
<div>
    <div class="header">
        <div class="header-left">
            <div class="app-name">
                <a href="/">ApexLegendsReportJP</a>
            </div>
        </div>
        <div class="header-center">
            <div class="register-id register-info">
                <small class="register-title">ID</small><br>
                {{your_id}}
            </div>
            <div class="register-name register-info">
                <small class="register-title">名前</small><br>
                {{your_first_name}} {{your_last_name}}
            </div>
            <div class="register-email register-info">
                <small class="register-title">メール</small><br>
                {{your_email}}
            </div>
        </div>
        <div class="header-right">
            <div></div>
        </div>
    </div>
    <div class="contents">
        <div class="content">
            <div class="eye-catch">
            </div>
            <div class="nav report-nav">
                <router-link class="nav-link report-nav-el report-nav-el-active active" to="/">チーターギャラリー</router-link>
                <router-link class="nav-link report-nav-el" to="/register">登録</router-link>
            </div>
        </div>
        <div class="hacker-gallery-head">
            <strong>チーターギャラリー</strong>
            <p>報告された先輩たち</p>
        </div>
        <div class="">
            <div class="hacker-gallery-search">
                <b-form-input v-model="search" type="text" placeholder="Search" />
                <!-- <i class="material-icons">search</i> -->
            </div>
            <div class="hacker-gallery-body">
                <div v-b-modal.report-form class="card text-center hacker-gallery-body-card" v-for="(value) in hacker_players" v-on:click="setHackerFromModal(value)">
                    <div class="card-body">
                        <h5 class="card-title">{{value}}</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
            </div>
            <div>
            </div>
            <b-modal size="xl" id="report-form" class="report-form" v-bind:title="hacker_id" @ok="" @shown="">
                <form>
                    <div class="hacker-modal">
                        <!-- Description Select -->
                        <div class="hacker-check-wrap">
                            <div class="form-check-wrap form-check" v-for="(value, key) in cheating">
                                <label class="form-check-label form-check-label-wrap user-select-none">
                                    <input class="form-check-input" type="checkbox" value="" v-bind:id="key">
                                    {{value}} ({{key}})
                                    <br>
                                    <small class="text-muted form-text">
                                        {{cheating_description[key]}}
                                    </small>
                                </label>
                            </div>
                        </div>
                        <div style="width: 5%"></div>
                        <!-- Description Text -->
                        <div class="form-group hacker-description-message-wrap">
                            <label for="hacker-description-message">
                                メッセージ　<small class="text-muted form-text">チート行為を選択すると自動的に入力されます</small>
                            </label>
                            <textarea v-model="hacker_message" class="form-control" id="hacker-description-message" :rows="hacker_message.split(/\n/).length"></textarea>
                        </div>
                    </div>
                </form>
            </b-modal>
        </div>
    </div>
    <div class="footer">
    </div>
</div>
</template>

<style>
    .header
    {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 50px;
        color: white;
        background: #191919;
        z-index: 100;
        display: flex;
        justify-content: center;
    }
    .header-left
    {
        width: 20%;
        display: flex;
        justify-content: flex-start;
    }
    .header-center
    {
        width: 60%;
        display: flex;
        justify-content: center;
    }
    .header-right
    {
        width: 20%;
        display: flex;
        justify-content: flex-end;
    }
    .contents
    {
        position: absolute;
        top: 50px;
        height: 1000px;
        width: 100%;
        flex: 1;
        bottom: 50px;
    }
    .footer
    {
        position: fixed;
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 25px;
        color: white;
        background: #191919;
        z-index: 100;
    }
    .app-name {
        margin: auto 10px;
    }
    .app-name a
    {
        font-weight: bold;
        color: white;
        text-decoration: none;
    }
    .content
    {
        width: 100%;
        background: #F9F9F9;
    }
    .eye-catch
    {
        width: 100%;
        height: 400px;
        background: #FFF url("../../../public/eye-catch-edit.jpg") no-repeat center top scroll;
    }
    .hacker-gallery-head
    {
        width: 100%;
        background: white;
        margin-top: 3px;
        display: block;
        text-align: center;
        padding: 40px 0;
        box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }
    .hacker-gallery-head strong
    {
        font-family: "游教科書体 横用","YuKyokasho Yoko"; font-weight: bold;
        font-size: 40px;
    }
    .hacker-gallery-head p
    {
        font-family: "游教科書体 横用","YuKyokasho Yoko"; font-weight: bold;
        font-size: 20px;
    }
    .hacker-gallery-body
    {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 100px;
    }
    .hacker-gallery-body-card
    {
        width: 200px;
        margin: 10px;
        cursor: pointer;
    }
    .hacker-gallery-search
    {
        width: 100%;
        padding-right: 10px;
        display: flex;
        justify-content: flex-end;
    }
    .hacker-gallery-search input
    {
        width: 250px;
    }
    .user-select-none
    {
        user-select: none;
    }
    .form-check-wrap
    {
        cursor: pointer;
        border-radius: 5px;
        box-sizing: border-box;
        padding-top: 10px;
    }
    .form-check-wrap:hover
    {
        background: rgba(0, 0, 0, 0.1);
    }
    .form-check-label-wrap
    {
        cursor: pointer;
        width: 100%;
        height: 100%;
    }
    .hacker-description-message-wrap
    {
        width: 50%;
    }
    .hacker-modal
    {
        display: flex;
        justify-content: center;
    }
    .hacker-check-wrap
    {
        width: 45%;
    }
    .report-nav
    {
        justify-content: center;
        background: white;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .report-nav-el
    {
        color: black;
        font-weight: bold;
        width: 250px;
    }
    .report-nav-el-active
    {
        color: #0257FF;
    }
    .register-info
    {
        text-align: center;
        padding: 0 10px;
    }
    .register-title
    {
        color: #A4A4A4;
    }
</style>

<script>
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
            setHackerFromModal(hackerId)
            {
                this.hacker_id = hackerId;
                this.hacker_message += (this.hacker_id+"\n------------")
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
            }
        },
        mounted () {
            this.setYou();
        }
    };
</script>
