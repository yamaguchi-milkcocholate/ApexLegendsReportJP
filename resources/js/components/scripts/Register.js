export default {
    name: "Register",
    data: function() {
        return {
            your_id: "",
            your_email: "",
            your_first_name: "",
            your_last_name: "",
        }
    },
    localStorage: {
        register_id: {
            type: String,
        },
        register_first_name: {
            type: String
        },
        register_last_name: {
            type: String
        },
        register_email: {
            type: String
        },
    },
    methods: {
        register: function() {
            this.$localStorage.set('register_id', this.your_id);
            this.$localStorage.set('register_first_name', this.your_first_name);
            this.$localStorage.set('register_last_name', this.your_last_name);
            this.$localStorage.set('register_email', this.your_email);
            this.setYou();
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
            console.log(tmp);
            console.log(typeof tmp)
        },
        remove: function() {
            this.$localStorage.remove('register_id');
            this.$localStorage.remove('register_first_name');
            this.$localStorage.remove('register_last_name');
            this.$localStorage.remove('register_email');
            this.your_id = "";
            this.your_first_name = "";
            this.your_last_name = "";
            this.your_email = "";
        }
    },
    mounted () {
        this.setYou();
    }
}
