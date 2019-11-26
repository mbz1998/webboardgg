<template>
    <div class="text-center text-sm-left">
        <div class="media">
            <div class="media-body">
                <img class="avatar img-thumbnail rounded-circle mr-sm-3 float-sm-left" :src="avatar">

                <h2 v-text="user.name"></h2>
                <ul class="list-inline text-xs-muted">
                    <li class="list-inline-item">Joined {{ joined }}</li>
                </ul>
            </div>
        </div>
        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload name="avatar" class="text-center text-sm-left" @loaded="onLoad"/>
        </form>
    </div>
</template>

<script>
    import ImageUpload from './ImageUpload.vue';
    import moment from "moment";

    export default {
        props: ['user'],
        components: {ImageUpload},
        data() {
            return {
                avatar: this.user.avatar_path
            };
        },
        computed: {
            canUpdate() {
                return this.authorize(user => user.id === this.user.id);
            },
            joined() {
                return moment(this.user.created_at).fromNow();
            }
        },
        methods: {
            onLoad(avatar) {
                this.avatar = avatar.src;
                this.persist(avatar.file);
            },
            persist(avatar) {
                let data = new FormData();

                data.append('avatar', avatar);

                axios.post(`/api/users/${this.user.id}/avatar`, data)
                    .then(() => flash('Avatar uploaded!'));
            }
        }
    }
</script>