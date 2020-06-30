<template>
    <layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>This is the Dashboard {{ firstName }} {{ lastName }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <reminder-list :reminders="reminders"></reminder-list>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from '../../Shared/Layout';
import ReminderList from '../Reminders/List';

export default {
    components: { Layout, ReminderList },

    props: ['firstName', 'lastName', 'reminders']
};
</script>
