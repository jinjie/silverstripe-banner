<div class="slick {$BannerClass}">
    <% loop $Slides %>
        <div class="slide">
            {$Banner}

            <% if $Title %>
                {$Title}
            <% end_if %>

            <% if $ShortTitle %>
                {$ShortTitle}
            <% end_if %>

        </div>
    <% end_loop %>
</div>