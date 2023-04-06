// approve the feedback
$("#approveFeedback").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedFeedback = [];
        $(":checkbox:checked").each(function(i) {
            selectedFeedback[i] = $(this).val();
        });
        if (selectedFeedback.length === 0) {
            alert("Please Select atleast one feedback");
        } else {
            $.ajax({
                url: "includes/feedbackcontrol?approveFeedback=",
                method: "POST",
                data: {
                    selectedFeedback: selectedFeedback,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// unapprove a feedback
$("#unapproveFeedback").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedFeedback = [];
        $(":checkbox:checked").each(function(i) {
            selectedFeedback[i] = $(this).val();
        });
        if (selectedFeedback.length === 0) {
            alert("Please Select atleast one feedback");
        } else {
            $.ajax({
                url: "includes/feedbackcontrol?unapproveFeedback=",
                method: "POST",
                data: {
                    selectedFeedback: selectedFeedback,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// delete a feedback
$("#deleteFeedback").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedFeedback = [];
        $(":checkbox:checked").each(function(i) {
            selectedFeedback[i] = $(this).val();
        });
        if (selectedFeedback.length === 0) {
            alert("Please Select atleast one feedback");
        } else {
            $.ajax({
                url: "includes/feedbackcontrol?deleteFeedback=",
                method: "POST",
                data: {
                    selectedFeedback: selectedFeedback,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// approve the cateory
$("#approveCategory").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedCategory = [];
        $(":checkbox:checked").each(function(i) {
            selectedCategory[i] = $(this).val();
        });
        if (selectedCategory.length === 0) {
            alert("Please Select atleast one category");
        } else {
            $.ajax({
                url: "includes/categorycontrol?approveCategory=",
                method: "POST",
                data: {
                    selectedCategory: selectedCategory,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// unapprove the category
$("#unapproveCategory").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedCategory = [];
        $(":checkbox:checked").each(function(i) {
            selectedCategory[i] = $(this).val();
        });
        if (selectedCategory.length === 0) {
            alert("Please Select atleast one category");
        } else {
            $.ajax({
                url: "includes/categorycontrol?unapproveCategory=",
                method: "POST",
                data: {
                    selectedCategory: selectedCategory,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// delete the cateory
$("#deleteCategory").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedCategory = [];
        $(":checkbox:checked").each(function(i) {
            selectedCategory[i] = $(this).val();
        });
        if (selectedCategory.length === 0) {
            alert("Please Select atleast one category");
        } else {
            $.ajax({
                url: "includes/categorycontrol?deleteCategory=",
                method: "POST",
                data: {
                    selectedCategory: selectedCategory,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// approve the service
$("#approveService").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedService = [];
        $(":checkbox:checked").each(function(i) {
            selectedService[i] = $(this).val();
        });
        if (selectedService.length === 0) {
            alert("Please Select atleast one service");
        } else {
            $.ajax({
                url: "includes/servicecontrol?approveService=",
                method: "POST",
                data: {
                    selectedService: selectedService,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// unapprove the service
$("#unapproveService").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedService = [];
        $(":checkbox:checked").each(function(i) {
            selectedService[i] = $(this).val();
        });
        if (selectedService.length === 0) {
            alert("Please Select atleast one service");
        } else {
            $.ajax({
                url: "includes/servicecontrol?unapproveService=",
                method: "POST",
                data: {
                    selectedService: selectedService,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// delete the service
$("#deleteService").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedService = [];
        $(":checkbox:checked").each(function(i) {
            selectedService[i] = $(this).val();
        });
        if (selectedService.length === 0) {
            alert("Please Select atleast one service");
        } else {
            $.ajax({
                url: "includes/servicecontrol?deleteService=",
                method: "POST",
                data: {
                    selectedService: selectedService,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// approve the post
$("#approvePost").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedPost = [];
        $(":checkbox:checked").each(function(i) {
            selectedPost[i] = $(this).val();
        });
        if (selectedPost.length === 0) {
            alert("Please Select atleast one Post");
        } else {
            $.ajax({
                url: "includes/postcontrol?approvePost=",
                method: "POST",
                data: {
                    selectedPost: selectedPost,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// unapprove the Post
$("#unapprovePost").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedPost = [];
        $(":checkbox:checked").each(function(i) {
            selectedPost[i] = $(this).val();
        });
        if (selectedPost.length === 0) {
            alert("Please Select atleast one Post");
        } else {
            $.ajax({
                url: "includes/postcontrol?unapprovePost=",
                method: "POST",
                data: {
                    selectedPost: selectedPost,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// delete the Post
$("#deletePost").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedPost = [];
        $(":checkbox:checked").each(function(i) {
            selectedPost[i] = $(this).val();
        });
        if (selectedPost.length === 0) {
            alert("Please Select atleast one Post");
        } else {
            $.ajax({
                url: "includes/postcontrol?deletePost=",
                method: "POST",
                data: {
                    selectedPost: selectedPost,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

$("#profile_setting").click(function() {
    window.location.replace("profile_setting");
});
$("#logout_setting").click(function() {
    window.location.replace("login_registration/logout");
});
// approve the comments
$("#approveComment").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedComment = [];
        $(":checkbox:checked").each(function(i) {
            selectedComment[i] = $(this).val();
        });
        if (selectedComment.length === 0) {
            alert("Please Select at least one Comment");
        } else {
            $.ajax({
                url: "includes/commentcontrol?approveComment=",
                method: "POST",
                data: {
                    selectedComment: selectedComment,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// unapprove the comments
$("#unapproveComment").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedComment = [];
        $(":checkbox:checked").each(function(i) {
            selectedComment[i] = $(this).val();
        });
        if (selectedComment.length === 0) {
            alert("Please Select at least one Comment");
        } else {
            $.ajax({
                url: "includes/commentcontrol?unapproveComment=",
                method: "POST",
                data: {
                    selectedComment: selectedComment,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// delete the comments
$("#deleteComment").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedComment = [];
        $(":checkbox:checked").each(function(i) {
            selectedComment[i] = $(this).val();
        });
        if (selectedComment.length === 0) {
            alert("Please Select at least one Comment");
        } else {
            $.ajax({
                url: "includes/commentcontrol?deleteComment=",
                method: "POST",
                data: {
                    selectedComment: selectedComment,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// approve the slider
$("#approveSlider").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedSlider = [];
        $(":checkbox:checked").each(function(i) {
            selectedSlider[i] = $(this).val();
        });
        if (selectedSlider.length === 0) {
            alert("Please Select at least one slider");
        } else {
            $.ajax({
                url: "includes/slidercontrol?approveSlider=",
                method: "POST",
                data: {
                    selectedSlider: selectedSlider,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// unapprove the slider
$("#unapproveSlider").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedSlider = [];
        $(":checkbox:checked").each(function(i) {
            selectedSlider[i] = $(this).val();
        });
        if (selectedSlider.length === 0) {
            alert("Please Select at least one slider");
        } else {
            $.ajax({
                url: "includes/slidercontrol?unapproveSlider=",
                method: "POST",
                data: {
                    selectedSlider: selectedSlider,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// delete the slider
$("#deleteSlider").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedSlider = [];
        $(":checkbox:checked").each(function(i) {
            selectedSlider[i] = $(this).val();
        });
        if (selectedSlider.length === 0) {
            alert("Please Select at least one slider");
        } else {
            $.ajax({
                url: "includes/slidercontrol?deleteSlider=",
                method: "POST",
                data: {
                    selectedSlider: selectedSlider,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});

// approve the member
$("#approveMember").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedMember = [];
        $(":checkbox:checked").each(function(i) {
            selectedMember[i] = $(this).val();
        });
        if (selectedMember.length === 0) {
            alert("Please Select at least one member");
        } else {
            $.ajax({
                url: "includes/teamcontrol?approveMember=",
                method: "POST",
                data: {
                    selectedMember: selectedMember,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});
// unapprove the member
$("#unapproveMember").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedMember = [];
        $(":checkbox:checked").each(function(i) {
            selectedMember[i] = $(this).val();
        });
        if (selectedMember.length === 0) {
            alert("Please Select at least one Comment");
        } else {
            $.ajax({
                url: "includes/teamcontrol?unapproveMember=",
                method: "POST",
                data: {
                    selectedMember: selectedMember,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
}); // delete the member
$("#deleteMember").click(function() {
    if (confirm("are you sure you wants to proced?")) {
        var selectedMember = [];
        $(":checkbox:checked").each(function(i) {
            selectedMember[i] = $(this).val();
        });
        if (selectedMember.length === 0) {
            alert("Please Select at least one Member");
        } else {
            $.ajax({
                url: "includes/teamcontrol?deleteMember=",
                method: "POST",
                data: {
                    selectedMember: selectedMember,
                },
                cache: false,
                success: function(html) {
                    window.location.reload();
                },
            });
        }
    } else {
        return false;
    }
});