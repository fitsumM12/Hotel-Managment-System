<?php

// Message from Admin
class Admin_message{
    public function fetchAdminMessage(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `title`, `message`,`status` from `hotel_admin_msg`");
        return $result;
    }
}

// Services

class Service{
    public function fetchService(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `title`, `message`, `image`, `status` FROM `services`");
        return $result;
    }
}
//  Testimonials -->

class Testimonial{
    public function fetchTestimonials(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `name`, `age`, `contact`, `email`, `status`,  `image`, `message` FROM `user`");
        return $result;
    }
}

// About  us
class About_us{
    public function fetchAbout_us(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `message`, `address`, `contact`, `email`, `image`, `instagram`, `facebook`, `twitter` FROM `about_us`");
        return $result;
    }
}

// Team Members
class TeamMembers{
    public function fetchTeamMembers(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `name`, `age`, `gender`, `image`, `address`, `contact`, `email`, `facebook`,`twitter` FROM `team_members`");
        return $result;
    }
}

class Gallery{
    public function fetchGallery(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `title`, `link`, `image` FROM `gallery`");
        return $result;
    }
}
class Slider {
    public function fetchSlider(){
        Global $conn;
        $result = $conn->query("SELECT `id`, `title`, `image`, `subtitle` FROM `slider`");
        return $result;
    }
}
?>