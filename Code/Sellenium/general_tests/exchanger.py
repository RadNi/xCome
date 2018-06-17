import time
import unittest

from selenium import webdriver
from test_utility import static_data, fields
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC


# These Test could be also used by all pages have charge

class Exchange(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.address = "user/profile"

    def test_exchanger(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        elements = fields.get_components_by_name(driver, ["CURR_FR_VAL=00", "CURR_FR", "CURR_TO", "convert", "CURR_VAL"])
        elements[3].click()
        time.sleep(2)
        assert elements[4].get_attribute('value') == "4,232,000.035"

    def test_exchanger_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        elements = fields.get_components_by_name(driver,
                                                 ["CURR_FR_VAL", "CURR_FR", "CURR_TO", "convert", "CURR_VAL"])
        elements[0].clear()
        elements[0].send_keys("as")
        elements[3].click()
        wait = WebDriverWait(driver, 10)
        wait.until(EC.alert_is_present())
        alert = driver.switch_to.alert
        time.sleep(2)
        assert "enter a number" in alert.text
        alert.accept()

    def tearDown(self):
        self.driver.close()

