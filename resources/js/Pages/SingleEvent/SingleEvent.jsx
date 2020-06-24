import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";
import ReactHtmlParser from "react-html-parser";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

import moment from "moment";

import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

export default function SingleEvent({ event }) {
    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    // console.log(event.image);

    return (
        <section style={{}}>
            <div>
                <Banner title={event.title ? event.title : ""} />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item">
                                <a href="/events">Events</a>
                            </li>

                            <li
                                className="breadcrumb-item active"
                                aria-current="page"
                            >
                                {event.title ? event.title : ""}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="container">
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        <div>
                            <img
                                src={event.image ? event.image : ""}
                                alt={event.title ? event.title : ""}
                            />
                        </div>

                        <h1 style={{ color: "#2a9df4" }}>
                            {event.title ? event.title : ""}
                        </h1>

                        <h4 style={{ color: "#2a9df4" }}>
                            <span style={{ color: "black" }}>Venue:</span>{" "}
                            {event.venue ? event.venue : ""}
                        </h4>

                        <div>
                            {ReactHtmlParser(
                                event.description ? event.description : ""
                            )}
                        </div>

                        <div className="row" style={{ color: "#2a9df4" }}>
                            <h4 className="col-sm-12 col-md-6">
                                <span style={{ color: "black" }}>Starts:</span>{" "}
                                {event.start_date
                                    ? moment(event.start_date).format(
                                          "MMMM Do YYYY, h:mm:ss a"
                                      )
                                    : ""}
                            </h4>

                            <h4>
                                <span style={{ color: "black" }}>Ends:</span>{" "}
                                {event.end_date
                                    ? moment(event.end_date).format(
                                          "MMMM Do YYYY, h:mm:ss a"
                                      )
                                    : ""}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

SingleEvent.layout = page => (
    <Layout children={page} title="Event Details | Kampala Hospital" />
);
