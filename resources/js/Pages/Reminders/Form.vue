<template>
    <div>
        <div class="form-group is-invalid">
            <label for="reminder">Reminder</label>
            <textarea id="reminder" class="form-control" :class="{ 'is-invalid': $page.errors.reminder }" v-model="reminder.reminder"></textarea>
            <div v-if="$page.errors.reminder" class="invalid-feedback">{{ $page.errors.reminder[0] }}</div>
        </div>

        <div class="form-group">
            <label for="date">Reminder date</label>
            <input type="date" name="date" id="date" class="form-control" :class="{ 'is-invalid': $page.errors.reminder_date }" v-model="reminder.reminder_date">
            <div v-if="$page.errors.reminder_date" class="invalid-feedback">{{ $page.errors.reminder_date[0] }}</div>
        </div>

        <div v-if="reminder.id">
            <button class="btn btn-primary mr-2" @click="handleAddNewReminder">Add Reminder</button>
            <inertia-link class="btn btn-outline-danger" :href="$route('reminder.note', {lead: lead, reminder: mainReminder})">Close Reminder</inertia-link>
        </div>
        <div v-else>
            <button class="btn btn-primary" @click="handleSubmit">Save</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            mainReminder: Object,
            lead: Object
        },

        data() {
            return {
                reminder: {
                    reminder: '',
                    reminder_date: ''
                }
            }
        },

        created() {
            this.reminder = this.mainReminder;
        },

        methods: {
            handleSubmit() {
                this.$emit('reminderSubmit', this.reminder);
            },
            handleAddNewReminder() {
                this.$emit('addNewReminder', this.reminder);
            }
        }
    }
</script>
