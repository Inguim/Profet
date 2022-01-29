import { format, parseISO } from "date-fns";

export const formatDateTime = (date) => {
  return format(parseISO(date.substring(0, 10)), 'dd/MM/yyyy');
}
