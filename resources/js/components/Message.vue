<template>
    <div class="container chat-container">
        <div class="row clearfix">
            <div class="col">
                <div class="chat-app">
                    <div id="plist" class="people-list border bg-white shadow rounded">
                        <div class="input-group header-function">
                            <input type="text" class="form-control rounded-pill icon" placeholder="Search...">
                            <div class="hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                <a href="javascript:void(0);" class="btn dropdown" data-toggle="dropdown"><i class="fa fa-plus"></i></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <li class="clearfix" v-for="user in users" :key="user.id" @click="changeMessenger(user)">
                                    <div class="item">
                                        <!-- <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar"> -->
                                        <img :src="'/images/'+user.information.image" alt="avatar">

                                        <i class="fa fa-circle online notify-badge"></i>
                                    </div>
                                    <div class="about">
                                        <div class="name truncate">{{ user.information.orgname }}</div>
                                        <div class="status truncate">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos, impedit error beatae aliquid odit, molestiae provident eveniet commodi blanditiis similique maiores explicabo! Quos dolorem at, accusamus amet qui facilis asperiores! </div>
                                    </div>
                                </li>
                        </ul>
                    </div>

                    <div class="chat border bg-white shadow rounded">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img :src="'/images/'+currentChat.information.image" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">{{ currentChat.information.orgname }}</h6>
                                        <small>Last seen: 2 hours ago</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">

                                    <a href="javascript:void(0);" class="btn"><i class="fa fa-search"></i></a>

                                    <a href="javascript:void(0);" class="btn dropdown" data-toggle="dropdown"><i class="fa fa-cogs"></i></a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0">
                                <li class="clearfix" v-for="message in currentChatMessage" :key="message.id">
                                    <div v-if="message.from == user_id">

                                        <div class="message-data text-right">
                                        <span class="message-data-time">{{timeChatSend(message.created_at)}}, {{dateFromNow(message.created_at)}}</span>
                                        <img :src="'/images/'+currentUser.information.image"  alt="avatar">
                                        </div>
                                        <div class="message other-message float-right"> {{message.text}}</div>
                                    </div>
                                    <div v-else>
                                        <div class="message-data">
                                            <img :src="'/images/'+currentChat.information.image" alt="avatar">
                                            <span class="message-data-time">{{timeChatSend(message.created_at)}}, {{dateFromNow(message.created_at)}}</span>
                                        </div>
                                        <div class="message my-message">{{message.text}}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <form @submit="messageText">
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-sm-1 icon-chat">
                                        <span class=""><i class="fa fa-paperclip"></i></span>
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 icon-chat">
                                        <span class=""><i class="fa fa-image"></i></span>
                                    </div>

                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control chat-input" placeholder="Enter text here..." v-model="text">
                                            <div class="input-group-prepend">
                                                <button type="submit" id="buttonSubmitVue">
                                                    <span class="input-group-text"><i class="fa fa-send"></i></span>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment-timezone';
    import moment1 from 'moment';
    export default {
        data: function () {
            return {
                users: [],
                user_id: this.$userId,
                currentUser:{},
                currentChat:{},
                currentChatMessage:[],
                text: '',
                count: 2,
            }
        },
        mounted() {
            this.loadUsers();
            this.loadUser();
        },
        methods: {
            loadUsers: function() {
                // Load Users with API
                axios.get('/api/users/'+this.user_id)
                    .then((response) => {
                        this.users = response.data;
                        this.currentChat = this.users[0];
                        this.loadCurrentChatMessage(this.currentChat.id);
                    })
                    .catch( function(error){
                        console.log(error);
                    });
            },
             loadUser: function() {
                // Load Users with API
                axios.get('/api/user/'+this.user_id)
                    .then((response) => {
                        this.currentUser = response.data;
                    })
                    .catch( function(error){
                        console.log(error);
                    });
            },
            loadCurrentChatMessage: function(to) {
                // Load Users with API
                axios.get('/api/message/'+this.user_id+'/'+to)
                    .then((response) => {
                        this.currentChatMessage = response.data;
                        console.log(this.currentChatMessage)
                    })
                    .catch( function(error){
                        console.log(error);
                    });
            },
            changeMessenger: function(user) {
                this.currentChat = user;
                this.loadCurrentChatMessage(user.id);
            },
            timeChatSend(date) {
                return moment(date).tz('Asia/Manila').format("hh:mm A")
            },
            dateFromNow(date) {
                return moment1(date).fromNow();
            },
            messageText(e) {
                e.preventDefault()
                const message = {
                    'from':this.user_id,
                    'to':this.currentChat.id,
                    'text':this.text,
                    'created_at':new Date(),
                    'updated_at':new Date()
                }

                // console.log(message);
                this.currentChatMessage.push(message);

                this.text = '';
            }
        }
    }
</script>

<style scoped>
#buttonSubmitVue {
    border: none;
}
</style>
