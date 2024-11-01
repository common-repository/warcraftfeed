(function($){
		$.fn.extend({
			warcraftfeed: function(options){
				var defaults = {
					characterName: 'thombu',
					realmName: 'lightnings-blade',
					region: 'eu',
					includeGeneralInformation: true,
					includeLatestAchievements: true
				}
				
				var options = $.extend(defaults, options);
				
				return this.each(function(){
					var o = options;
					var container = $(this);
					var feed = "http://www.warcraftfeed.co.uk/getJSONP.php?character=" + o.characterName + "&realm=" + o.realmName + "&region=" + o.region + "&callback=?";
					var item = null;

					$(container).html('<p>Loading data...</p>');
					
					$.getJSON(feed, function(data){
						$(container).html('');
						if (o.includeGeneralInformation === true)
						{
							$(container).append('<ul class="wf-character-info wf-list"></ul>');
							$('.wf-character-info').append('<li><h3 class="wf-section-title" style="font-size: 120%;">Character Information</h3></li>');
							$('.wf-character-info').append('<li><span class="wf-character-name"><a href="http://' + o.region + '.battle.net/wow/en/character/' + o.realmName + '/' + o.characterName + '/simple" target="_blank">' + data.characterInfo.name + '</a> of ' + data.characterInfo.realm + '</span></li>');
							$('.wf-character-info').append('<li>Level ' + data.characterInfo.level + ', ' + data.characterInfo.race + ' ' + data.characterInfo.spec + ' ' + data.characterInfo.class + '</li>');							$('.wf-character-info').append('<li>Achievement Points: ' + data.characterInfo.achievementPoints + '</li>');
						}
						
						if ((o.includeGeneralInformation === true) && (o.includeLatestAchievements === true))
						{
							$(container).append('<br />');
						}
						
						if (o.includeLatestAchievements === true)
						{
							$(container).append('<ul class="wf-latest-achievements wf-list"></ul>');
							$('.wf-latest-achievements').append('<li><h3 class="wf-section-title" style="font-size: 120%;">Latest Achievements</h3></li>');
							$.each(data.recentAchievements, function(i, item){
								$('.wf-latest-achievements').append('<li><strong><a href="' + item.permalink + '" target="_blank">' + item.title + '</a></strong></li>');
								$('.wf-latest-achievements').append('<li>' + item.points + ' points - ' + item.date.replace(/\/([0-9]{2})$/i, "/20$1") + '</li>');
							});
						}
					});
				});
			}
		});
})(jQuery);