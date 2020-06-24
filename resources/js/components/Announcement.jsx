import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import ReactHtmlParser from "react-html-parser";
import moment from "moment";

export default function Announcement({ announcement }) {
    return (
        <div>
            <div className="row mt-3">
                <img
                    className="col-4"
                    src="assets/images/icons/shout.svg"
                    alt="Announcement Title"
                    style={{
                        width: "100%",
                        height: "100px",
                        borderRadius: "10%"
                    }}
                />

                <div className="col-8">
                    <InertiaLink
                        href={`/announcements/${
                            announcement ? announcement.id : "#"
                        }`}
                    >
                        <div className="limit-1-lines">
                            <div>
                                <h5
                                    style={{
                                        color: "#2a9df4",
                                        fontWeight: "bold"
                                    }}
                                >
                                    {announcement ? announcement.title : ""}
                                </h5>
                            </div>
                        </div>
                    </InertiaLink>

                    <div className="limit-3-lines">
                        <div>
                            {ReactHtmlParser(
                                announcement.description
                                    ? announcement.description
                                    : ""
                            )}
                        </div>
                    </div>

                    <h6 style={{ fontWeight: "bold" }}>
                        {announcement
                            ? moment(announcement.created_at).format(
                                  "MMMM Do YYYY, h:mm:ss a"
                              )
                            : ""}
                    </h6>
                </div>
            </div>
        </div>
    );
}
