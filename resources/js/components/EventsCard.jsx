import React from "react";
import Event from "../components/Event";
import { InertiaLink } from "@inertiajs/inertia-react";

import ReactHtmlParser from "react-html-parser";
import moment from "moment";

export default function EventsCard({ event }) {
    // console.log(event.datetime);
    // debugger;
    return (
        <div className="col-sm-12 col-lg-4 mt-5">
            <div
                className="event "
                style={{
                    margin: "0px 0px",
                    backgroundColor: "white",
                    padding: "20px",
                    borderRadius: "10px",
                    height: "100%"
                }}
            >
                <div className="">
                    <div className="">
                        <InertiaLink
                            href={`/events/${event.id ? event.id : ""}`}
                        >
                            <img
                                src={event.image ? event.image : ""}
                                alt={event.title ? event.title : ""}
                                className="img-fluid"
                                style={{ height: "200px" }}
                            />
                        </InertiaLink>

                        <InertiaLink
                            href={`/events/${event.id ? event.id : ""}`}
                        >
                            <div className="limit-1-lines">
                                <div>
                                    <h4
                                        className="text-center mt-3"
                                        style={{ fontWeight: "bold" }}
                                    >
                                        {event && event.title
                                            ? event.title
                                            : ""}
                                    </h4>
                                </div>
                            </div>
                        </InertiaLink>

                        <div className="limit-2-lines text-center">
                            <div>
                                {ReactHtmlParser(
                                    event && event.description
                                        ? event.description
                                        : ""
                                )}
                            </div>
                        </div>

                        {/* <small style={{ fontWeight: "bold" }}>
                            {moment(
                                event && event.created_at
                                    ? event.created_at
                                    : ""
                            ).fromNow()}
                        </small> */}

                        <p className="text-center mt-3">
                            <span className="font-weight-bold">Starts:</span>{" "}
                            {event && event.start_date
                                ? moment(event.start_date).format(
                                      "MMMM Do YYYY, h:mm a"
                                  )
                                : ""}
                        </p>

                        <p className="text-center">
                            <span className="font-weight-bold">Ends:</span>{" "}
                            {event && event.end_date
                                ? moment(event.end_date).format(
                                      "MMMM Do YYYY, h:mm a"
                                  )
                                : ""}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}
