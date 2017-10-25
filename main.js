"use strict"

var app = {
    initialId: 4,
    container: jQuery('#face-users'),
    doing: false,
    init: function() {
        var self = this;

        if (window.location.hash && parseInt(window.location.hash.substr(1))) {
            this.initialId = window.location.hash.substr(1);
        }

        setInterval(function() {
            self.addUsers();
        }, 500);
    },
    addUsers: function() {
        if (this.doing) {
            return;
        }

        this.doing = true;

        var newUsers = '';
        for (var i = 0; i < 100; i++) {
            newUsers += '<a href="' + this.profileLink(this.initialId) + '" target="_blank">';
            newUsers += '<img src="' + this.pictureLink(this.initialId) + '" onerror="app.remove(this)"></a>';

            this.initialId++;
            i++;
        }

        this.container.append(newUsers);
        this.doing = false;
    },
    profileLink: function(userId) {
        return 'https://fb.com/' + userId;
    },
    pictureLink: function(userId) {
        return '//graph.facebook.com/' + userId + '/picture';
    },
    remove: function(imgElement) {
        jQuery(imgElement).parent('a').remove();
    }
};

jQuery(document).ready(function($) {
    app.init();
});