import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";
import ReactHtmlParser from "react-html-parser";

import Banner from "../../components/Banner";

import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

function AnnouncementDetails({ announcement }) {
    // console.log(announcement);

    nProgress.start();
    // useEffect(() => {
    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section style={{}}>
            <div>
                <Banner title={announcement ? announcement.title : ""} />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item">
                                <a href="/announcements">Announcements</a>
                            </li>

                            <li
                                className="breadcrumb-item active"
                                aria-current="page"
                            >
                                {announcement ? announcement.title : ""}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="container">
                <div className="row">
                    <div className="col-sm-12 col-md-3 mt-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9 mt-3">
                        <h1 className="ml-2" style={{ color: "#2a9df4" }}>
                            {announcement ? announcement.title : ""}
                        </h1>

                        <div className="mt-5 container">
                            {ReactHtmlParser(
                                announcement ? announcement.description : ""
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

AnnouncementDetails.layout = page => (
    <Layout children={page} title="Announcement Details | Kampala Hospital" />
);

export default AnnouncementDetails;
