export default {
    name: "About",
    data: () => {
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
    },
    mounted () {
        this.setYou();
    }
}
