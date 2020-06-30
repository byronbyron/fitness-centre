<template>
    <div class="card">
        <div class="card-header">
            Reminders list
        </div>

        <div class="card-body">
            <div class="list-group list-group-flush">
                <inertia-link class="list-group-item list-group-item-action" v-for="reminder in reminders" :key="reminder.id" :href="$route('reminder.view', {lead: reminder.lead, reminder: reminder})">
                    <strong>{{ reminder.lead.name }}</strong><br>
                    {{ reminder.reminder }}
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            reminders: Array
        }
    }
</script>
