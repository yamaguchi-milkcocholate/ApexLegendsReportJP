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
            <div>right</div>
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
            <div class="hacker-gallery-body">
                <div class="card text-center hacker-gallery-body-card" v-for="(value) in hacker_players">
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
            <div class="report-form">
                <form>
                    <!-- Hacker ID -->
                    <div class="form-hacker">
                        <!-- Hacker 記入 -->
                        <div class="form-hacker-fill">
                            <label for="hacker-id">チーターのID</label>
                            <input v-model="hacker_id" class="form-control" id="hacker-id" aria-describedby="hacker-id-help" autocomplete="on" list="hacker-players">
                            <datalist id="hacker-players">
                                <option v-for="(value) in hacker_players" :value="value"></option>
                            </datalist>
                            <small id="hacker-id-help" class="form-text text-muted">チート行為を行っていると疑われるプレイヤーのID</small>
                        </div>
                        <!-- Hacker 選択 -->
                        <div class="form-hacker-select">
                            <div class="form-hacker-select-express">
                                報告された先輩たち
                                <small class="text-muted">
                                    クリックすると報告対象に追加できます
                                </small>
                            </div>
                            <div class="form-hacker-select-box">

                            </div>
                        </div>
                    </div>
                    <!-- Description Select -->
                    <div class="form-check" v-for="(value, key) in cheating">
                        <label class="form-check-label user-select-none">
                            <input class="form-check-input" type="checkbox" value="" v-bind:id="key">
                            {{value}} ({{key}})
                            <br>
                            <small class="text-muted form-text">
                                {{cheating_description[key]}}
                            </small>
                        </label>
                    </div>
                    <!-- Description Text -->
                    <div class="form-group">
                        <label for="hacker-description-message">
                            メッセージ　<small class="text-muted form-text">チート行為を選択すると自動的に入力されます</small>
                        </label>
                        <textarea v-model="message" class="form-control" id="hacker-description-message" :rows="message.split(/\n/).length"></textarea>
                    </div>
                    <div class="form-submit-wrap">
                        <button type="submit" class="btn btn-primary form-submit">Submit</button>
                    </div>
                </form>
            </div>
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
    }
    .hacker-gallery-body-card
    {
        width: 200px;
        margin: 10px;
    }
    .form-hacker
    {
        display: flex;
        justify-content: center;
    }
    .form-hacker-fill
    {
        box-sizing: border-box;
        width: 30%;
        padding-right: 10px;
    }
    .form-hacker-select
    {
        box-sizing: border-box;
        width: 70%;
        padding-left: 10px;
    }
    .form-hacker-select-express
    {

    }
    .form-hacker-select-box
    {

    }
    .user-select-none
    {
        user-select: none;
    }
    .form-submit
    {
        margin: 10px auto;
        display: block;
        width: 200px;
        padding: 10px 0;
    }
    .form-submit-wrap
    {
        margin-top: 10px;
        margin-bottom: 100px;
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
                your_id: "",
                your_email: "",
                your_first_name: "",
                your_last_name: "",
                hacker_id: "",
                message: "",
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
            remove: function() {
                this.$localStorage.remove('register_id');
                this.$localStorage.remove('register_first_name');
                this.$localStorage.remove('register_last_name');
                this.$localStorage.remove('register_email');
            },
            setYou: function() {
                this.your_id = this.$localStorage.get('register_id');
                this.your_first_name = this.$localStorage.get('register_first_name');
                this.your_last_name = this.$localStorage.get('register_last_name');
                this.your_email = this.$localStorage.get('register_email');
            }
        },
        mounted () {
            this.setYou();
        }
    };
</script>
