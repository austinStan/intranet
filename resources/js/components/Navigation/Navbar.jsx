import React, { useEffect } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";

import classNames from "classnames";
import Swal from "sweetalert2";

import axios from "axios";

export default function Navbar() {
    // const { app, path } = usePage();
    // // console.log(path);
    // const isActive = path.current;
    // // console.log(isActive);
    // const textClasses = classNames({
    //     active: isActive
    // });

    const logout = async event => {
        try {
            event.preventDefault();

            const response = await axios.post("logout/");
            console.log(response.data);

            return <InertiaLink href="/login" />;

            return Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Logged Out Successfully",
                showConfirmButton: false,
                timer: 1500
            });
        } catch (error) {
            // Swal.fire({
            //     icon: "error",
            //     title: "An Error Occurred",
            //     text: "Something went wrong!"
            //     // footer: '<a href>Why do I have this issue?</a>'
            // });
            console.log(error);
        }
    };

    return (
        <nav className="navbar navbar-expand-lg navbar-light fixed-top">
            <a className="navbar-brand" href="/">
                Kampala Hospital
            </a>

            <button
                className="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span className="navbar-toggler-icon"></span>
            </button>

            <div className="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div className="navbar-nav  mx-auto">
                    <a
                        className="nav-item nav-link active navigation-link"
                        href="/"
                    >
                        Home <span className="sr-only">(current)</span>
                    </a>

                    <a
                        className="nav-item nav-link navigation-link"
                        href="/announcements"
                    >
                        Announcements
                    </a>

                    <a
                        className="nav-item nav-link navigation-link"
                        href="/documents"
                    >
                        Documents
                    </a>

                    <a
                        className="nav-item nav-link navigation-link"
                        href="/events"
                    >
                        Events
                    </a>

                    <a
                        className={`nav-item nav-link navigation-link `}
                        href="/news"
                    >
                        News
                    </a>

                    <a
                        className="nav-item nav-link navigation-link"
                        href="/staff"
                    >
                        Staff
                    </a>

                    {/* <a
                        className="nav-item nav-link navigation-link"
                        href="/#departments"
                    >
                        Departments
                    </a> */}

                    <a
                        className="nav-item nav-link navigation-link"
                        href="/walloffame"
                    >
                        Wall Of Fame
                    </a>

                    {/* <InertiaLink
                        className="nav-item nav-link navigation-link"
                        href="/logout"
                        method="POST"
                    >
                        Logout
                    </InertiaLink> */}

                    {/* <InertiaLink
                        href="/logout"
                        method="post"
                        className="nav-item nav-link navigation-link"
                    >
                        Logout
                    </InertiaLink> */}
{/* 
                    <form onSubmit={logout}>
                        <button
                            className="btn mb-2 nav-item nav-link navigation-link"
                            type="submit"
                        >
                            Logout
                        </button>
                    </form> */}
                    <a
                        className="nav-item nav-link navigation-link"
                        href="/logout"
                    >
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    );
}
