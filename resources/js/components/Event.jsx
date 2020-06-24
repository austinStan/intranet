import React from "react";
import ReactHtmlParser from "react-html-parser";
import moment from "moment";
import { InertiaLink } from "@inertiajs/inertia-react";

export default function Event({ event }) {
    return (
        <div
            className="event"
            style={{
                margin: "20px 0px",
                backgroundColor: "white",
                padding: "20px",
                borderRadius: "10px"
            }}
        >
            <div className=" ">
                <div className="">
                    <InertiaLink href={`/events/${event.id ? event.id : "#"}`}>
                        <div className="limit-1-lines">
                            <div>
                                <h4 style={{ fontWeight: "bold" }}>
                                    {event.title ? event.title : ""}{" "}
                                </h4>
                            </div>
                        </div>
                    </InertiaLink>

                    <div className="limit-3-lines">
                        <div>
                            {ReactHtmlParser(
                                event.description ? event.description : ""
                            )}
                        </div>
                    </div>
                </div>

                <h6 className="mt-3" style={{ fontWeight: "bold" }}>
                    {moment(event.start_date ? event.start_date : "").format(
                        "MMMM Do YYYY, h:mm a"
                    )}
                </h6>
            </div>
        </div>
    );
}
